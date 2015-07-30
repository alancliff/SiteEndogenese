<?php

	class Upload{

		private	$destino,
				$files = array(),
				$c = 0,
				$e = 0;
		public	$errors = array();

		public function Upload($pasta = false){

			$this->destino = $pasta;

		}

		public function addFile($file,$formatos = NULL,$maxsize = NULL,$limitoffiles = NULL){

			if(is_array($file['name'])){
				foreach($file as $key => $v){
					foreach($v as $k => $va){
						$filem[$k][$key] = $va;
					}
				}
			}else{
				$filem[0] = $file;
			}
			$i=0;
			$added=0;
			foreach($filem as $v){
				$i++;
				if($i <= $limitoffiles or is_null($limitoffiles)){
					$tmp_name = $v['name'];
					if(@in_array(strtolower(pathinfo($tmp_name,PATHINFO_EXTENSION)),$formatos) or @in_array(pathinfo($tmp_name,PATHINFO_EXTENSION),$formatos) or is_null($formatos)){
						if($maxsize === NULL or $v['size'] <= $maxsize){
							$this->files[$this->c] = $v;
							$this->c++;
							$added++;
						}else{
							$this->errors[$this->e] = 'Arquivo "'.$v['name'].'" muito grande!';
							$this->e++;
						}
					}else{
						$this->errors[$this->e] = 'Estensão invalida "'.$v['name'].'"!';
						$this->e++;
					}
				}
			}
			return $added;

		}

		public function filesResize($width,$height = NULL,$medoto = 'crop'){
			
			foreach($this->files as $k=>$file){
				
				$temppast = 'temp';
				if(is_dir($temppast)){
					chmod($temppast,0777);
				}else{
					mkdir($temppast,0777);
				}
				$filename = $temppast.'/'.uniqid().$file['name'];
				copy($file['tmp_name'],$filename);
				$image = new canvas($filename);
				$image->redimensiona($width,$height,$medoto);
				$image->grava($filename);
				$this->files[$k]['tmp_name'] = $filename;
				
			}

		}

		public function retornaFiles($uniqname = false){
			
			$return = array();
			$i = 0;
			if($this->destino === false){
				$arquivos = new Objeto("arquivos",5);
				foreach($this->files as $file){
					$tmp_name = $file['tmp_name'];
					$name = $file['name'];
					$c = fread(fopen($tmp_name, "r"), filesize($tmp_name));
					$arquivos->Inserir(array(
						"nome" => $name,
						"tipo" => $file['type'],
						"size" => filesize($tmp_name),
						"dados" => $c
					));
					unlink($tmp_name);
					$return[$i] = $arquivos->getID();
					$i++;
				}
			}else{
				foreach($this->files as $file){
					$tmp_name = $file['tmp_name'];
					$name = $file['name'];
					$newname = ($uniqname?uniqid():"").($uniqname?"":$name).($uniqname?".".strtolower(pathinfo($name,PATHINFO_EXTENSION)):"");
					copy($tmp_name,$this->destino."/".$newname);
					chmod($this->destino."/".$newname,0777);
					unlink($tmp_name);
					$return[$i] = $this->destino."/".$newname;
					$i++;
				}
			}
			$this->c = 0;
			$this->files = array();
			if(count($return) == 0){
				return false;
			}
			return $return;
			
		}

	}

?>