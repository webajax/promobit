<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;



class UserService
{
    protected $service_container;
    protected $passwordEncoder;
    protected $mailer;
    protected $mailermailer;

 
    public function __construct(ContainerInterface $service_container,UserPasswordEncoderInterface $passwordEncoder, \Swift_Mailer $mailersend,MailerInterface $mailerMailer) 
    {
        $this->service_container = $service_container;  
	    $this->passwordEncoder   = $passwordEncoder; #pass encoder security
        $this->mailer            = $mailersend; #pass encoder security
        $this->mailermailer      = $mailerMailer; #pass encoder security
    }
    
    #LAYER RULES
    public function add(User $user)
    {

        #echo "<pre>" ,print_r($user->getName());exit;
        $encoded          = "";
        $responseService  = "";
        
        #------------------------------------------------------if validation is empty
        if($user->getName() == ""){
            echo "O campo nome não pode ser vazio";
            exit;
        }
         
        if($user->getPassword() == ""){
            echo "O campo senha não pode ser vazio";
            exit;
        }    


        if($user->getEmail() == ""){
            echo "O campo email não pode ser vazio";
            exit;
        }        
        #------------------------------------------------------end validation


        #message,success ...
        $responseService =  $this->service_container->get('App\Service\ResponseService');


        #-----------------------------------------------------------------------email VALID
        $userDao         =  $this->service_container->get('App\Dao\UserDao');    
        $where           = " where u.username = '{$user->getUsername()}' ";
        $responsemail    = $userDao->getList($where);

        if($responsemail)
        {
            $responseService->setSuccess(true);
            $responseService->setMessage('Email Existente escolha outro!');
            $responseService->setStrongMessage('Sucesso!');

            return $responseService;

        }
        #----------------------------------------------------end email valid
       


        #Encode pass
        $encoded = $this->passwordEncoder->encodePassword($user,$user->getPassword());
        $user->setPassword($encoded);


           
        $response = $userDao->add($user);   
        

        
        if($user)
        {
            $responseService->setSuccess(true);
            #$responseService->setRedirect('pesq_usuario');
            #$responseService->setStyle('alert alert-success');
            #$responseService->setIcon('icon-ok');
            $responseService->setMessage('Usuário cadastrado com sucesso');
            $responseService->setStrongMessage('Sucesso!');
        }
        else
        {
            $responseService->setSuccess(false);
            #$responseService->setRedirect('pesq_usuario');
            #$responseService->setStyle('alert alert-error');
            #$responseService->setIcon('icon-exclamation-sign');
            $responseService->setMessage('Erro ao cadastrar o usuário');
            $responseService->setStrongMessage('Erro!');
        }    

            return $responseService;
    }

    public function update(User $user)
    {
    
        #echo "<pre>" ,print_r($user->getName());exit;
        $encoded          = "";
        $responseService  = "";
        
        #------------------------------------------------------if validation is empty

        if($user->getEmail() == ""){
            echo "O campo email não pode ser vazio";
            exit;
        }        
        #------------------------------------------------------end validation


        #message,success ...
        $responseService =  $this->service_container->get('App\Service\ResponseService');
        $userDao         =  $this->service_container->get('App\Dao\UserDao'); 

       
        $fields = "";

        #-------------------------------------------------------------WHERE
        if($user->getName() != "")
            $fields = " u.name='{$user->getName()}' , ";
        

        if($user->getEmail() != "")
           $fields = $fields ." u.email = '{$user->getEmail()}' ";
  
        #------------------------------------------------------------END WHERE

       if($fields != ""){



            #-----------------------------------------------------------------------email VALID
            $userDao         =  $this->service_container->get('App\Dao\UserDao');    
            $where           = " where u.username = '{$user->getUsername()}' ";
            $responsemail    = $userDao->getList($where);

            #echo "<pre>" ,print_r($responsemail);exit;

            if(!$responsemail)
            {
                $responseService->setSuccess(false);
                $responseService->setMessage('Email não Existe escolha outro!');
                $responseService->setStrongMessage('Sucesso!');

                return $responseService;

            }else{



                if($user->getUsername() == $user->getEmail())
                {
                  $where="UPDATE App\Entity\User u  SET 
                  $fields 
                    WHERE u.username='{$user->getUsername()}' ";   
                }else{
                    
                  $where="UPDATE App\Entity\User u  SET 
                  $fields , u.username = '{$user->getEmail()}' 
                    WHERE u.username='{$user->getUsername()}' ";                   
                }    

                $response = $userDao->query($where);   
                

                if($user)
                {          

                            $responseService->setSuccess(true);
                            $responseService->setMessage('Usuário/Email Alterado e salvo com sucesso');
                            $responseService->setStrongMessage('Sucesso!');
                    

                }
                else
                {
                    $responseService->setSuccess(false);
                    #$responseService->setRedirect('pesq_usuario');
                    #$responseService->setStyle('alert alert-error');
                    #$responseService->setIcon('icon-exclamation-sign');
                    $responseService->setMessage('Erro ao cadastrar o usuário');
                    $responseService->setStrongMessage('Erro!');
                }  

            }
            #----------------------------------------------------end email valid


 

       }
               
            return $responseService;    

    }

    public function delete($data)
    {

        #------------------------------------------------------if validation is empty

        if($data["email"] == ""){
            echo "O campo email não pode ser vazio";
            exit;
        }        
        #------------------------------------------------------end validation


        #message,success ...
        $responseService =  $this->service_container->get('App\Service\ResponseService');
        $userDao         =  $this->service_container->get('App\Dao\UserDao');         
           
        $response = $userDao->query("DELETE  FROM App\Entity\User u where u.email='". $data["email"] . "'");
        

        if($response)
        {
            $responseService->setSuccess(true);
            #$responseService->setRedirect('pesq_usuario');
            #$responseService->setStyle('alert alert-success');
            #$responseService->setIcon('icon-ok');
            $responseService->setMessage('Usuário deletado com sucesso');
            $responseService->setStrongMessage('Sucesso!');
        }
        else
        {
            $responseService->setSuccess(false);
            #$responseService->setRedirect('pesq_usuario');
            #$responseService->setStyle('alert alert-error');
            #$responseService->setIcon('icon-exclamation-sign');
            $responseService->setMessage('Erro ao deletar o usuário  ou usuário inexistente');
            $responseService->setStrongMessage('Erro!');
        }    

            return $responseService;
    }


    public function login(User $user)
    {
    
        #echo "<pre>" ,print_r($user->getName());exit;
        $encoded          = "";
        $responseService  = "";
        
        #------------------------------------------------------if validation is empty

        if($user->getPassword() == ""){
            echo "O campo password não pode ser vazio";
            exit;
        }   

        if($user->getUsername() == ""){
            echo "O campo email não pode ser vazio";
            exit;
        }        
        #------------------------------------------------------end validation


        #message,success ...
        $responseService =  $this->service_container->get('App\Service\ResponseService');
        $userDao         =  $this->service_container->get('App\Dao\UserDao'); 

       
        $where = "";

        #-------------------------------------------------------------WHERE
        
        #Encode pass
        $encoded = $this->passwordEncoder->encodePassword($user,$user->getPassword());
        $user->setPassword($encoded);

          $where = " WHERE u.username = '{$user->getUsername()}' AND u.password = '{$encoded}'  ";
  
        #------------------------------------------------------------END WHERE


        $response  = $userDao->getList($where);


        if($response)
        {
            $responseService->setSuccess(true);
            $responseService->setMessage('Login efetuado com sucesso');
            $responseService->setStrongMessage('Sucesso!');
        }
        else
        {
            $responseService->setSuccess(false);
            $responseService->setMessage('Erro ao efetuar login!');
            $responseService->setStrongMessage('Erro!');
        }    

               
            return $responseService;    

    }    


       public function restorePass(User $user )
    {
    

        $responseService  = "";
        
        #------------------------------------------------------if validation is empty

        if($user->getUsername() == ""){
            echo "O campo email não pode ser vazio";
            exit;
        }        
        #------------------------------------------------------end validation


        #message,success ...
        $responseService =  $this->service_container->get('App\Service\ResponseService');
        $userDao         =  $this->service_container->get('App\Dao\UserDao'); 

       
        #-----------------------------------------------------------------------email VALID
        $where           = " where u.username = '{$user->getUsername()}' ";
        $responsemail    = $userDao->getList($where);

        $body="<html><body><a>ddddddddd</a></body></html>";

        if($responsemail)
        {



           /*$email = (new \Swift_Message('Hello Email'))
                ->setFrom('somicro@ig.com.br')
                ->setTo("andre@webajax.com.br")
                ->setBody($body,'text / html'); */

          $email = (new Email())
            ->from('suportebravocorp@gmail.com')
            ->to('andre@webajax.com.br')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');  
              
          $this->mailermailer->send($email);
          # return $this->mailer->send($email);


        }
        #----------------------------------------------------end email valid

         

    }    

}

?>
