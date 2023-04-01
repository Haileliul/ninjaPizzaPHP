 <?php
 $title=$email=$ingridiant= '';
 $errors = [
  'email' => '',
  'title' => '' ,
  'ingredient' => '',
 ];

 if(isset($_POST['submit'])){

  if(empty($_POST['email'])){
    $errors['email']= "An Email is required ";
  }else{
    $email = $_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
       $errors['email'] ="The Valid Email must be entered";
    }
    else {
      echo htmlspecialchars($_POST['email']). "<br>";
    }
   
  }
  if(empty($_POST['title'])){
    $errors['title']= "The title is required ";
  }else{
    $title = $_POST['title'];
    if(!preg_match('/^[a-zA-Z\s]+$/', $title))
    {
      $errors['title']="Enter valid title";
    }else {
      echo htmlspecialchars($_POST['title'])."<br>";
    }

    
  }
  if(empty($_POST['ingridiant'])){
    $errors['ingredient']="This ingridiant is required ";
  }else{
    $ingridiant = $_POST['ingridiant'];
    if(!preg_match('/^\s*\w+(?:\s*,\s*\w+)*\s*$/',$ingridiant))
    {
       $errors['ingredient']="Enter the valid ingerediant";
    }
    else {
      echo htmlspecialchars($_POST['ingridiant'])."<br>";
    }
    
  }
 }
?>
 
<!DOCTYPE html>
<html lang="en">
 <?php include './template/head.php' ?>
 <div class = "my-10">
 <div class= " text-center text-gray-500 text-3xl mb-2 ">
     Add Pizza 
 </div>
  <div class="container bg-white mx-auto px-50 max-w-lg">
    <form action="add.php" method= "POST" class ="py-10 px-10" >
          <label for=""> Your Email</label><br>
          <input type="text" name= "email" value="<?php echo $email?>" class="border-b-2 border-r-4  focus:outline-none w-full " >
          <div class="text-red-200"> <?php echo $errors['email'] ?> </div>
          <br><br>
          <label for="">Pizza Title</label><br>
          <input type="text" name="title" value="<?php echo $title?>" class="border-b-2 border-r-4 focus:outline-none  w-full">
           <div class="text-red-200"><?php echo $errors['title']?></div>
          <br><br>
          <label for="">Ingrediants (Comma separated)</label><br>
          <input type="text" name="ingridiant" value="<?php echo $ingridiant ?>" class="border-b-2 border-r-4 focus:outline-none  w-full" >
           <div class="text-red-200 "> <?php echo $errors['ingredient'] ?></div> 
          <br><br>
          <button type= "submit" name="submit" class="bg-blue-300 hover:bg-orange-200 px-10 py-2 border-b-2 border-r-4 border-pink-300 text-lg  "> Submit </button>
    </form>
  </div>
  </div>



 <?php include './template/foot.php'  ?>
</html>