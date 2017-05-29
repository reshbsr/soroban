<?php

/**
*Генерация случайных чисел
*/

class Tasks
{

	//Функция подсчитывает сумму элементов массива
	public function sum($array){
	$sum=0;
		foreach ($array as $value) {
			$sum=$sum+$value;
		}
	return $sum;
	}

/**
*	Функция принимает число, которое обозначает количество цифр в возвращаемом максимальном числе. Функция возвращает максимальное число при указанном количестве цифр.
	*/
	private function max_num($len)
	{
		$max="9";
		for($i=1; $i<$len; $i++){
			$max=$max."9";
		}
		$max=(int) $max;
		return $max;
	}

//Функция разбивает число на цифры и записывает их в массив
	public function cifra_array($num){
		if($num<0)
			$num=-$num;
		$num = (string) $num;
		$array= str_split($num);
		foreach ($array as $key => $value)
			$result[]=(int) $value;
	return $result; 
	}

//Преобразует массив, содержащий числа, в массив, содержащий строки, содержащие цифры.
	public function strform($array){
			// $array[0]=(string) $array[0];
		for($i=0; $i<count($array); $i++){
			if($array[$i]>0){
			$array[$i]=(string) $array[$i];
			$array[$i]="".$array[$i];//В кавычках можно написать +, чтобы он тображался перед положительным числом
			}
			if($array[$i]<0)
			$array[$i]=(string) $array[$i];
		}
		return $array;
	}

private function simple_add($rnd1){
		switch ($rnd1){
		case 0:
			$num=[1,2,3,4,5,6,7,8,9,0];
			break;
		case 1:
			$num=[1,2,3,5,6,7,8,0];
			break;
		case 2:
			$num=[1,2,5,6,7,0];
			break;
		case 3:
			$num=[1,5,6,0];
			break;
		case 4:
			$num=[5,0];
			break;
		case 5:
			$num=[1,2,3,4,0];
			break;
		case 6:
			$num=[1,2,3, 0];
			break;
		case 7:
			$num=[1,2, 0];
			break;
		case 8:
			$num=[1, 0];
			break;
		case 9:
			$num=[0];
		}
		$key=array_rand($num);
		$rnd2=$num[$key];		
		return $rnd2;
	}

	private function simple_sub($rnd1){
		switch ($rnd1){
		case 0:
			$num=[0];
			break;
		case 1:
			$num=[1, 0];
			break;
		case 2:
			$num=[1,2, 0];
			break;
		case 3:
			$num=[1,2,3,0];
			break;
		case 4:
			$num=[1,2,3,4,0];
			break;
		case 5:
			$num=[5,0];
			break;
		case 6:
			$num=[1,5,6,0];
			break;
		case 7:
			$num=[1,2,5,6,7,0];
			break;
		case 8:
			$num=[1,2,3,5,6,7,8,0];
			break;
		case 9:
			$num=[1,2,3,4,5,6,7,8,9,0];
		}
		$key=array_rand($num);
		$rnd2=$num[$key];		
		return $rnd2;
	}
	


public function simple_add_sub($len=1,$summands=2){
	if($len==1){
		$rnd1=mt_rand(1, 9);
		$rnd[]=$rnd1;
		for($i=2; $i<=$summands; $i++){
				switch ($rnd1){
			case 0:
				$num=[1,2,3,4,5,6,7,8,9];
				break;
			case 1:
				$num=[1,2,3,5,6,7,8,-1];
				break;
			case 2:
				$num=[1,2,5,6,7,-1,-2];
				break;
			case 3:
				$num=[1,5,6, -1, -2, -3];
				break;
			case 4:
				$num=[5, -1, -2, -3, -4];
				break;
			case 5:
				$num=[1, 2, 3, 4, -5];
				break;
			case 6:
				$num=[1, 2, 3, -1, -5, -6];
				break;
			case 7:
				$num=[1, 2, -1,-2, -5, 	-6, -7];
				break;
			case 8:
				$num=[1, -1, -2, -3, -5, -6, -7, -8];
				break;
			case 9:
				$num=[-1,-2,-3,-4,-5,-6,-7,-8,-9];
		}
		$key=array_rand($num);
		$rnd2=$num[$key];	
		$rnd[]=$rnd2;
		$rnd1=$this->sum($rnd);
		}
	return $rnd;
	}
	else{
		$rnd1=mt_rand(10, 99);
		$rnd[]=$rnd1;
		$rnd1_ca=$this->cifra_array($rnd1);//Функция разбивает число на цифры и записывает их в массив
		for($i=2; $i<=$summands; $i++){
			do
			{
				switch ($rnd1_ca[1]){
					case 0:
						$num=[1,2,3,4,5,6,7,8,9,0];
						break;
					
					case 1:
						$num=[1,2,3,5,6,7,8,-1,0];
						break;
					
					case 2:
						$num=[1,2,5,6,7,-1,-2,0];
						break;
					
					case 3:
						$num=[1,5,6, -1, -2, -3,0];
						break;
					
					case 4:
						$num=[5, -1, -2, -3, -4,0];
						break;
					
					case 5:
						$num=[1, 2, 3, 4, -5,0];
						break;
					
					case 6:
						$num=[1, 2, 3, -1, -5, -6,0];
						break;
					
					case 7:
						$num=[1, 2, -1,-2, -5, 	-6, -7,0];
						break;
					
					case 8:
						$num=[1, -1, -2, -3, -5, -6, -7, -8,0];
						break;
					
					case 9:
						$num=[-1,-2,-3,-4,-5,-6,-7,-8,-9,0];
				}
				$key=array_rand($num);
				$rnd2_ca[1]=$num[$key];
				if($rnd2_ca[1]>=0)
					$rnd2_ca[0]=$this->simple_add($rnd1_ca[0]);
				else
					$rnd2_ca[0]=$this->simple_sub($rnd1_ca[0]);
				$rnd2_ca0=(string)$rnd2_ca[0];
				$minus=1;
				if($rnd2_ca[1]<0){
					$rnd2_ca[1]=-$rnd2_ca[1];
				$minus=-1;
				}
				$rnd2_ca1=(string)$rnd2_ca[1];
				$rnd2=$rnd2_ca0.$rnd2_ca1;
				$rnd2=(int)$rnd2;
				$rnd2=$rnd2*$minus;
				$flag=true;
				if($rnd2==0)
					$flag=false;
			}
			while ( $flag=== false);
				$rnd[]=$rnd2;
				$rnd1=$this->sum($rnd);
				$rnd1_ca=$this->cifra_array($rnd1);
				}
			return $rnd;
			}
}

//Сложение и вычитание: малые друзья

//Функция генерирует случайные числа, которые состоят либо из цифр от 1 до 4, либо из цифр от 5 до 8
private function rnd_1458(){
	$array=[[1, 2, 3, 4], [5, 6, 7, 8]];
	$key=rand(0, 1);
	$key_cf=array_rand($array[$key]);
	$cf0=$array[$key][$key_cf];
	$cf0=(string)$cf0;
	$key_cf=array_rand($array[$key]);
	$cf1=$array[$key][$key_cf];
	$cf1=(string)$cf1;
	$num=$cf0.$cf1;
	$num=(int)$num;
	return $num;
}

private function small_friends_add($rnd1){
		switch ($rnd1){
		case 0:
			$num=[0];
			break;
		case 1:
			$num=[4,0];
			break;
		case 2:
			$num=[3,4,0];
			break;
		case 3:
			$num=[2,3,4,0];
			break;
		case 4:
			$num=[1,2,3,4,0];
			break;
		case 5:
			$num=[0];
			break;
		case 6:
			$num=[0];
			break;
		case 7:
			$num=[0];
			break;
		case 8:
			$num=[0];
			break;
		case 9:
		$num=[0];
		}
		$key=array_rand($num);
		$rnd2=$num[$key];		
		return $rnd2;
	}

	private function small_friends_sub($rnd1){
		switch ($rnd1){
		case 0:
			$num=[0];
			break;
		case 1:
			$num=[0];
			break;
		case 2:
			$num=[0];
			break;
		case 3:
			$num=[0];
			break;
		case 4:
			$num=[0];
			break;
		case 5:
			$num=[1, 2, 3, 4, 0];
			break;
		case 6:
			$num=[2, 3, 4, 0];
			break;
		case 7:
			$num=[3, 4, 0];
			break;
		case 8:
			$num=[4, 0];
			break;
		case 9:
			$num=[0];
		}
		$key=array_rand($num);
		$rnd2=$num[$key];
		return $rnd2;
	}
	
	public function small_friends_add_sub($len=1,$summands=2){
	if($len==1){
		$rnd1=mt_rand(1, 8);
		$rnd[]=$rnd1;
		for($i=2; $i<=$summands; $i++){
				switch ($rnd1){
			case 1:
				$num=[4];
				break;
			case 2:
				$num=[3, 4];
				break;
			case 3:
				$num=[2, 3, 4];
				break;
			case 4:
				$num=[1, 2, 3, 4];
				break;
			case 5:
				$num=[-1,-2,-3,-4];
				break;
			case 6:
				$num=[-2,-3,-4];
				break;
			case 7:
				$num=[-3,-4];
				break;
			case 8:
				$num=[-4];
			}
		$key=array_rand($num);
		$rnd2=$num[$key];
		$rnd[]=$rnd2;
		$rnd1=$this->sum($rnd);
		}
	return $rnd;
	}
	else{
		$rnd1=$this->rnd_1458();//Функция генерирует случайные числа, которые состоят либо из цифр от 1 до 4, либо из цифр от 5 до 8
		$rnd[]=$rnd1;
		$rnd1_ca=$this->cifra_array($rnd1);//Функция разбивает число на цифры и записывает их в массив
		for($i=2; $i<=$summands; $i++){
			do
			{
				switch ($rnd1_ca[0]){
					case 0:
						$num=[0];
						break;
					
					case 1:
						$num=[4,0];
						break;
					
					case 2:
						$num=[3,4,0];
						break;
					
					case 3:
						$num=[2, 3, 4,0];
						break;
					
					case 4:
						$num=[1, 2, 3, 4, 0];
						break;
					
					case 5:
						$num=[-1, -2, -3, -4, 0];
						break;
					
					case 6:
						$num=[-2,-3,-4,0];
						break;
					
					case 7:
						$num=[-3,-4,0];
						break;
					
					case 8:
						$num=[-4,0];
						break;
					
					case 9:
						$num=[0];
				}
				
				$key=array_rand($num);
				
				$rnd2_ca[0]=$num[$key];
				if($rnd2_ca[0]>=0)
					$rnd2_ca[1]=$this->small_friends_add($rnd1_ca[1]);
				else
					$rnd2_ca[1]=$this->small_friends_sub($rnd1_ca[1]);
				$rnd2_ca1=(string)$rnd2_ca[1];
				$minus=1;
				if($rnd2_ca[0]<0){
					$rnd2_ca[0]=-$rnd2_ca[0];
					$minus=-1;
				}
				$rnd2_ca0=(string)$rnd2_ca[0];		
				
				$rnd2=$rnd2_ca0.$rnd2_ca1;
				$rnd2=(int)$rnd2;
				$rnd2=$rnd2*$minus;
				$flag=true;
				if($rnd2==0)
					$flag=false;
			}
			while ( $flag===false);
			$rnd[]=$rnd2;
			$rnd1=$this->sum($rnd);
			$rnd1_ca=$this->cifra_array($rnd1);
		}
	return $rnd;
	}
}

//Сложение и вычитание: семья

public function family_add_sub($len=1, $summands=2){
		$max=$this->max_num($len);
		$rnd1=mt_rand(1, $max);
		$rnd[0]=$rnd1;

		for ($i=2; $i<=$summands; $i++){

			do {
				$rnd2=mt_rand(-$max, $max);
			} while ( $rnd2==0);

		$rnd_summ_previous=$this->sum($rnd);
		$rnd_summ_now=$rnd_summ_previous+$rnd2;
		if($rnd_summ_now>=0)
			$rnd[]=$rnd2;
		else
			$i--;
		}
		
	return $rnd;		
	
}


}
	/**
	* подключение звуковых файлов
	*/
	class SoundStrJavasript
	{
		private $str1='{name: "';
		private $str2_sound_nums;
		private $str3='", path: "';
		private $str4_path;
		private $str5='"},';
		private $str6='], path: "';
		private $str7_path;
		private $str8='",';
		
		function __construct($str4_path, $path)
		{
			$this->str4_path=$str4_path;
			$this->str7_path=$path;
		}
//Функция возвращает строку, содержащую номера звуковых файлов, используется для подключения звуковых файло в яваскрипте
	public function str_javascript($rnd_nums){
		$str1=$this->str1;
		$str3=$this->str3;
		$str4_path=$this->str4_path;
		$str5=$this->str5;
		$str6=$this->str6;
		$str7_path=$this->str7_path;
		$str8=$this->str8;
		foreach ($rnd_nums as $key => $value) {
			$str[]=$str1.$value.$str3.$str4_path.$str5;
			echo $str[$key];

		}
		echo $str6.$str7_path.$str8; 
		$this->str2_sound_nums=$str;
	return $str;
	}	
}

?>