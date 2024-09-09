<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Models\Report;

class ContactsController
{
    public function submit(Request $request): void
    {
        $report = new Report;
        $report->setEmail($request->post('email'));
        $report->setSubject($request->post('subject'));
        $report->setMessage($request->post('message'));
        $report->store();
        Redirect::to('/contacts');
    }
}
