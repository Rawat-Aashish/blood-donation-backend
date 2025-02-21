<?php

namespace App\Http\Controllers;

use App\Mail\BloodRequestMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function getBlood(User $user, Request $request)
    {

        $donors = User::where('blood_group_id', $user->blood_group_id)
            ->where('id', '!=', $user->id)
            ->get();

        $failedEmails = [];

        foreach ($donors as $donor) {
            try {
                Mail::to($donor->email)->send(new BloodRequestMail(
                    $user->name,
                    $user->email,
                    $user->bloodGroup->type, // Fetching blood group type from relation
                    $user->mobile_num
                ));
            } catch (Exception $e) {
                $failedEmails[] = [
                    'email' => $donor->email,
                    'error' => $e->getMessage()
                ];
            }
        }

        if (!empty($failedEmails)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Some emails failed to send.',
                'failed_emails' => $failedEmails
            ], 500);
        }

        return response()->json([
            'message' => 'mail sent to the user with same blood group as yours',
            'status' => '1'
        ]);
    }
}
