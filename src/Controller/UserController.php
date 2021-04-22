<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\UserService;


class UserController  {

    protected $userService;
    

    #dependency injection
    public function __construct(UserService $userService){        
        #change service construct
        $this->userservice     = $userService;
          
    }

 	 /**
     * @Route("/", methods={"GET"})
     */

	public function index(){
		echo "Método Inválido";
		exit;		
	}

 	 /**
     * @Route("/user/add", methods={"POST"})
     */

	public function postAdd(Request $request)
	{	
		
		
		#get values JSON
	    $data = json_decode($request->getContent(), true); 


	    #object user entity
	    $user = new \App\Entity\User();
        $user->setName($data["name"]);
        $user->setUsername($data["email"]);
        $user->setEmail($data["email"]);
		$user->setPassword($data["pass"]);



        #call service rules	
	    $userService  = $this->userservice->add($user);


	    if($userService->getSuccess()){

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Mesage:" => $userService->getMessage() 
	    	);

	    }else{

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Message:" => $userService->getMessage() 
	    	);

	    }


	    return new JsonResponse($userService);



	}

 	 /**
     * @Route("/user/update", methods={"POST"})
     */

	public function putUpdate(Request $request){
		

		#get values JSON
	    $data = json_decode($request->getContent(), true); 


	    #object user entity
	    $user = new \App\Entity\User();
        $user->setName($data["name"]);
        $user->setUsername($data["username"]);
        $user->setEmail($data["email"]);
		$user->setPassword($data["pass"]);



        #call service rules	
	    $userService  = $this->userservice->update($user);


	    if($userService->getSuccess()){

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Mesage:" => $userService->getMessage() 
	    	);

	    }else{

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Message:" => $userService->getMessage() 
	    	);

	    }


	    return new JsonResponse($userService);

	}

 	 /**
     * @Route("/user/delete", methods={"POST"})
     */

	public function postDelete(Request $request){



		#get values JSON
	    $data = json_decode($request->getContent(), true); 



        #call service rules	
	    $userService  = $this->userservice->delete($data);


	    if($userService->getSuccess()){

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Mesage:" => $userService->getMessage() 
	    	);

	    }else{

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Message:" => $userService->getMessage() 
	    	);

	    }


	    return new JsonResponse($userService);

		
	}

 	 /**
     * @Route("/user/login", methods={"POST"})
     */

	public function postLogin(Request $request){


		#get values JSON
	    $data = json_decode($request->getContent(), true); 


	    #object user entity
	    $user = new \App\Entity\User();
        $user->setUsername($data["email"]);
		$user->setPassword($data["pass"]);



        #call service rules	
	    $userService  = $this->userservice->login($user);


	    if($userService->getSuccess()){

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Mesage:" => $userService->getMessage() 
	    	);

	    }else{

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Message:" => $userService->getMessage() 
	    	);

	    }


	    return new JsonResponse($userService);



	}

	 /**
     * @Route("/user/restorepass", methods={"GET"})
     */

	public function postRestorePass(Request $request){


		#get values JSON
	    $data = json_decode($request->getContent(), true); 


	    #object user entity
	    $user = new \App\Entity\User();
        $user->setUsername("andre@webajax.com.br");


        #call service rules	
	    $userService  = $this->userservice->restorePass($user);

	    echo "<pre>" ,print_r($userService);
	    exit;

	    if($userService->getSuccess()){

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Mesage:" => $userService->getMessage() 
	    	);

	    }else{

	    	$userService = array(
	    		"Success:"=> $userService->getSuccess(),
	    		"Message:" => $userService->getMessage() 
	    	);

	    }


	    return new JsonResponse($userService);



	}		

}
