<?php
	include("constans.php");
	session_start();
	function addBinarUser($userId) {
		include("connection.php");
		$array = $mysqli->query("SELECT * FROM machine_current_states")->fetch_array();
		$index = $array['lastServedBinar'];
		$added = False;
		$q0="SELECT * FROM relations_binar WHERE bIndex=$index";
		$res = $mysqli->query($q0);
		while ($current = $res -> fetch_array()) {
			$index = $current['bIndex'];
			if ($current['child0'] === NULL) {
				$newIndex = $index * 2 + 1;
				$id=$current['userId'];
				$q="INSERT INTO relations_binar (userId, child0, child1, bIndex) values ($userId, NULL, NULL, $newIndex)";
				$mysqli->query($q);
				$q1 = "UPDATE relations_binar SET child0=$userId WHERE bIndex=$index";
				$mysqli->query($q1);
				$mysqli->query("UPDATE machine_current_states SET lastServedBinar=$index");
				$mysqli->query("UPDATE user SET binar=1 WHERE userId=$userId");
				return "OK";
			} else if ($current['child1'] === NULL) {
				$newIndex = $index * 2 + 2;
				$id=$current['userId'];
				$q="INSERT INTO relations_binar (userId, child0, child1, bIndex) values ($userId, NULL, NULL, $newIndex)";
				$mysqli->query($q);
				$q1 = "UPDATE relations_binar SET child1=$userId WHERE bIndex=$index";
				$mysqli->query($q1);
				$mysqli->query("UPDATE machine_current_states SET lastServedBinar=$index");
				$mysqli->query("UPDATE user SET binar=1 WHERE userId=$userId");
				return "OK"; 
			} else {
				$index +=1;
				$res = $mysqli->query("SELECT * FROM relations_binar WHERE bIndex=$index");
				
			}
		}
		return "";
	}


	function addBinarUserWithReffer($userId, $reffer) {
		include("connection.php");
		$children = array('0' => $mysqli->query("SELECT bIndex FROM relations_binar WHERE userId=$reffer ORDER BY bIndex ASC")->fetch_array()['0']);
		for($i = 0; $i < count($children); $i ++) {
			$index = $children[$i];
			$position = $mysqli->query("SELECT * FROM relations_binar WHERE bIndex=$index")->fetch_array();
			if ($position['child0'] === NULL) {
				$newIndex = $index * 2 + 1;
				$id=$position['userId'];
				$q="INSERT INTO relations_binar (userId, child0, child1, bIndex) values ($userId, NULL, NULL, $newIndex)";
				$mysqli->query($q);
				$mysqli->query("UPDATE relations_binar SET child0=$userId WHERE bIndex=$index");
				$mysqli->query("UPDATE user SET binar=1 WHERE userId=$userId");
				return "OK";
			} else if ($position['child1'] === NULL) {
				$newIndex = $index * 2 + 2;
				$id=$position['userId'];
				$q="INSERT INTO relations_binar (userId, child0, child1, bIndex) values ($userId, NULL, NULL, $newIndex)";
				$mysqli->query($q);
				$mysqli->query("UPDATE relations_binar SET child1=$userId WHERE bIndex=$index");
				$mysqli->query("UPDATE user SET binar=1 WHERE userId=$userId");
				return "OK";
			} else {
				$newIndex = $index * 2 + 1;
				array_push($children, $newIndex);
				array_push($children, $newIndex + 1);
			}
		}

	}
	
?>