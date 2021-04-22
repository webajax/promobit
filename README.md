# REST SYMFONY

**Requeriments:**
php 7.2 or ^

 **Instalation:**

1. clone project
2. composer install 
3. run system : symfony server:start
4. Postman type: localhost::8000 
5. file promobit.sql import workbench 

#----------------------------------------------------------
**Add User (Method = POST)**

In Postman choose: Body - raw - type json

**url:  "http://localhost:8000/user/add"**

{
  "name" : "yourname",
  "pass" : "yourpass",
  "email": "youremail"
}

Click Send
 >if succcess: 
 
{
    "Success:": true,
    "Mesage:": "Usuário cadastrado com sucesso"
}
#--------------------------------------------------------


#----------------------------------------------------------
**Update User (Method = POST)**

In Postman choose: Body - raw - type json

**url:  "http://localhost:8000/user/update"**

{
  "name" : "yourname",
  "pass" : "youremail",
  "email": "youremail",
  "username": "yourusername"
}

name pass and email alter only this fields
if alter username alter username and email

Click Send
 >if succcess: 
 
{
    "Success:": true,
    "Mesage:": "Usuário salvo com sucesso"
}
#--------------------------------------------------------

#----------------------------------------------------------
**Delete User (Method = POST)**

In Postman choose: Body - raw - type json

**url:  "http://localhost:8000/user/delete"**

{
  "email": "youremail"
}



Click Send
 >if succcess: 
 
{
    "Success:": true,
    "Mesage:": "Usuário deletado com sucesso"
}
#--------------------------------------------------------

**Login User (Method = POST)**

In Postman choose: Body - raw - type json

**url:  "http://localhost:8000/user/login"**

{
  "email": "youremail",
  "pass" : "yourpass"
}



Click Send
 >if succcess: 
 
{
    "Success:": true,
    "Mesage:": "Login efetuado com sucesso"
}
#--------------------------------------------------------


Recuperação de senha não deu tempo pra fazer , estou com muita tarefa. 


