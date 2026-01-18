<?php



namespace App\Services;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class AuthService
{
    private $UserRepository;
    private $RoleRepository;
    public function __construct()
    {
        $this->UserRepository = new UserRepository();
        $this->RoleRepository = new RoleRepository();
    }
    public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
    }

    public function checkPassword($email, $passwordUser)
    {
        $data = $this->UserRepository->findByEmail($email);
        if (password_verify($passwordUser, $data['password'])) {
            $role = $this->RoleRepository->getRoleBy($data['role_id']);
            $_SESSION['user'] = [
                'id' => $data['id'],
                'email' => $data['email'],
                'role' => $role['name']
            ];
            return true;
        }
    }

    public function exictEmail($email)
    {

        $exict = $this->UserRepository->findByEmail($email);
        if ($exict) {
            return true;
        }
    }

    public function exictRole($id)
    {
        if ($this->RoleRepository->getRoleBy($id)) {
            $role = $this->RoleRepository->getRoleBy($id);
            return $role;
        }
    }


    public function confirmePassword($password, $confirme)
    {
        if ($password == $confirme) {
            return true;
        }
    }

    public function isAdmin($role)
    {
        if (strtoupper($role) == "ADMIN") {
            return true;
        }
    }


    function sendVerificationEmail($email, $verificationCode)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'alikkamal0000@gmail.com';
        $mail->Password = 'password dyali app password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('alikkamal0000@gmail.com', 'TalentHub');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = "<h3>Email Verification</h3><p>Your verification code is: <b>$verificationCode</b></p>";
        $mail->AltBody = "Your verification code is: $verificationCode";

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    }
}


    public function Verification($origin_code,$code_user){
        if($origin_code == $code_user){
            return true;
        }
    }



}