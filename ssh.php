<?php
include('Net/SSH2.php');

$sftp = new Net_SSH2('www.domain.tld');
$sftp->login('username', 'password');

echo $sftp->read('username@username:~$');
$sftp->write("sudo ls -la\n");
$output = $sftp->read('#Password:|username@username:~\$#', NET_SSH2_READ_REGEX);
echo $output;
if (preg_match('#Password:#', $lines)) {
    $ssh->write("password\n");
    echo $sftp->read('username@username:~$');
}
?>
