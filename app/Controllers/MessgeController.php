<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class MessgeController extends BaseController
{

    private $chat;
    public function __construct()
    {
        $this->chat = new MessageModel();
    }
    public function chatBot()
    {
       $data['chat'] = $this->chat->findAll();
        return view('admin/chatbot', $data);  
    }
    public function getResponse()
    {

        
        $message = $this->request->getPost('message');


        $response = $this->chat->getResponseByKeyword(strtolower($message));
        
        // If no match is found, use the default response
        if (!$response) {
            $response = $this->chat->getDefaultResponse();
        }        

        return $this->response->setJSON(['response' => $response]);
    }
}
