<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn'))
        {
            if(session()->get('role') === 'Admin')
            {
            return redirect()->to('/dashboard');
            
            }
            
            elseif(session()->get('role') === 'MainAdmin')
            {
            return redirect()->to('/dashboard');
            
            }
            elseif(session()->get('role') === 'Booker')
            {
                return redirect()->to('booking');


                $usersModel = new UserModel();
                $user = $usersModel->find($session->get('userID'));

                if ($user['is_verified'] == 0) {
                    return redirect()->to('/verify-email');
                }
            }
        }

        
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}