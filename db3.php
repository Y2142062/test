<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>商品一覧</title>
	</head>
	<body>
		
	  <?php
	     require_once '_database_conf.php';
	     require_once '_h.php';

	     try
	     {
            //読み出し（Read）、全て

				//読み出し（Read）、並べ替え

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				//$sql='SELECT code,name,price FROM table3 ORDER BY price DESC';
				$sql='SELECT code,name,price FROM table3 ORDER BY price';
				$stmt=$db->prepare($sql);
				$stmt->execute();

				$db=null;

             //for

				$count = $stmt -> rowCount();
				for ($i = 0; $i < $count; $i++)
				{
					$rec=$stmt->fetch(PDO::FETCH_ASSOC);
					print h($rec['code']).' ';
					print h($rec['name']).' ';
					print h($rec['price']);
					print '<br />';
				}

	     }
	     catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
	  ?>
	</body>
</html>