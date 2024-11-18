<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EventsModel;
use App\Models\AcceptbookingModel;


class UserEvntPostController extends BaseController
{
    private $userevent;
    private $acceptbooking;

    public function __construct()
    {
        $this->userevent = new EventsModel();
        $this->acceptbooking = new AcceptbookingModel();
    }

    public function userEventpost()
    {
        $user = session()->get('userID');
        $data = [
           
            'notif' => $this->acceptbooking
                ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
                acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
                acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
                acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
                user.userID, user.LastName, user.FirstName')                                                                        
                ->join('user', 'user.userID = acceptbooking.usersignsId')
                ->where('acceptbooking.usersignsId', $user )
                ->findAll(),
                
        'notifs' => $this->acceptbooking
            ->select('acceptbooking.id, acceptbooking.lastname, acceptbooking.firstname, 
            acceptbooking.middlename, acceptbooking.contactnum, acceptbooking.event, 
            acceptbooking.time, acceptbooking.prefferdate, acceptbooking.equipment, 
            acceptbooking.comments, acceptbooking.status, acceptbooking.usersignsId, 
            user.userID, user.LastName, user.FirstName')
            ->join('user', 'user.userID = acceptbooking.usersignsId')
            ->where('acceptbooking.status', 'Accepted')->where('acceptbooking.usersignsId', $user )
            ->first(),
        'getCount' => $this->acceptbooking->select('Count(*) as notif')->where('acceptbooking.usersignsId', $user)->first(),
        
        ];

        return view ('admin/userEventPost', $data);
    }

    public function usersavepost()
    {
        // Validation rules
        $rules = [
            'Title'       => 'required|min_length[5]',
            'Description' => 'required|min_length[5]',
            'Organizer'   => 'required|min_length[5]',
            'Atendees'    => 'required|min_length[5]',
            'Category'    => 'required', // Ensuring Category is provided
        ];
    
        // If form validation passes
        if ($this->validate($rules)) {
            // Path to store the uploaded images
            $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/upload/events/';
            
            // Handle multiple image uploads
            $images = $this->request->getFileMultiple('Attachments');
    
            // Check if the number of uploaded files exceeds the PHP limit
            if (count($images) > ini_get('max_file_uploads')) {
                // Return a custom error message if too many files
                return redirect()->back()->with('error', 'You have exceeded the maximum number of file uploads.')->withInput();
            }
    
            // Check if any file exceeds the allowed upload size based on PHP settings
            foreach ($images as $file) {
                // Check if file size exceeds the maximum allowed (upload_max_filesize or post_max_size)
                if ($file->getError() == UPLOAD_ERR_INI_SIZE || $file->getError() == UPLOAD_ERR_FORM_SIZE) {
                    return redirect()->back()->with('error', 'One or more files exceed the maximum allowed upload size.')->withInput();
                }
            }
    
            // If all checks pass, proceed with file uploads
            $uploadedImages = $this->uploadImages($images, $imagePath);
    
            // Prepare data to save into the database
            $data = [
                'Attachments' => implode(',', $uploadedImages), // Store uploaded image paths as a comma-separated string
                'usersignsid' => $this->request->getVar('usersignsId'),
                'Title'       => $this->request->getVar('Title'),
                'Description' => $this->request->getVar('Description'),
                'Organizer'   => $this->request->getVar('Organizer'),
                'Start_date'  => $this->request->getVar('Start_date'),
                'End_date'    => $this->request->getVar('End_date'),
                'Status'      => 'Draft',
                'Atendees'    => $this->request->getVar('Atendees'),
                'adminId'     => $this->request->getVar('adminId'),
                'type'        => 'user',
            ];
    
            // Handle the Category field: Convert to a plain comma-separated string without array signs
            $categories = $this->request->getVar('Category');
            if (!empty($categories)) {
                // Ensure $categories is an array, then implode it into a comma-separated string
                $data['Category'] = implode(', ', (array) $categories); // Store categories as a string without array notation
            }
    
            // Save event data to the database
            $this->userevent->save($data);
    
            // Redirect to the success page with a success message
            return redirect()->to('/usereventpost')->with('success', 'Data has been uploaded.');
        } else {
            // Validation failed, return with validation errors
            return redirect()->back()->with('error', $this->validator->listErrors())->withInput();
        }
    }
    
    private function uploadImages($files, $uploadPath)
    {
        $uploadedImages = [];
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Generate a random name for the image to avoid overwriting
                $imageName = $file->getRandomName();
                // Move the file to the server
                $file->move($uploadPath, $imageName);
                // Collect the uploaded file names
                $uploadedImages[] = $imageName;
            }
        }
        return $uploadedImages;
    }
    }
