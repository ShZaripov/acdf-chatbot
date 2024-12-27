<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Bu yerda kontakt ma'lumotlarini saqlash yoki email jo'natish mumkin
        try {
            // Masalan: email jo'natish
            // Mail::to('admin@example.com')->send(new ContactMessage($request->all()));

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}
