<?php
if (!isset($_SESSION)) session_start();
unset($_SESSION["users"]);
?>
<script language="javascript">
	window.location="index.php";
</script>