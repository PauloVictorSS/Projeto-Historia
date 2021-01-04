<main>
	<section class="resolvendo-questoes">
		<div class="center">

			<?php
				if(!empty($_POST["id_questao"]))
					$_SESSION["id_questao"] = $_POST["id_questao"];

				$id_questao = $_SESSION["id_questao"];

				$result = Questao::selectQuestion($id_questao);
				$questao = $result[0];

				if(isset($_SESSION['id_usuario'])){
					$id_usuario = $_SESSION['id_usuario'];

					if(User::checksQuestionResolved($id_usuario, $id_questao) == 1)
						$resolveu = "Questão já resolvida";
					else
						$resolveu = "Questão ainda não resolvida";
				}

				$tipo = $questao['tipo'];

				$vestibular = $questao['vestibular'];
				$ano = $questao['ano'];
				$sub_tema = $questao['subtema'];
				$id_materia = $questao['id_materia'];

				$enunciado = $questao['enunciado'];
				$imagem = $questao['imagem'];
				$especial = $questao['especial'];
				$pergunta = $questao['pergunta'];
				
				$alternativa_A = $questao['alternativa_a'];
				$alternativa_B = $questao['alternativa_b'];
				$alternativa_C = $questao['alternativa_c'];
				$alternativa_D = $questao['alternativa_d'];
				$alternativa_E = $questao['alternativa_e'];

				$gabarito = $questao['alternativa_certa'];
				$explicacao = $questao['explicacao'];

				$resolucao = INCLUDE_PATH.'resolucao_de_questoes';
				$areaquestoes = INCLUDE_PATH.'area_de_questoes';

				echo "<h1>Questão sobre $sub_tema</h1>";

				if(isset($resolveu))
					echo "<p class='right'>$resolveu</p>";
				
				echo "<div class='clear'></div>";
				echo "<hr>";

				echo "<p><b>($vestibular $ano)</b> $enunciado</p>";
							
				if(!empty($imagem))
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $imagem ).'"/>';
				
				if(!empty($especial))
					echo "<p$especial</p>";
						
				if(!empty($pergunta))
					echo "<p><b>$pergunta</b></p>";

				echo "<form action='#gabaritos' method='POST' id='form_alternativas'>";

				if($tipo == 1){
					
					echo "<input type='radio' id='lettler_A' name='lettler' value='A' class='input-radio' required>";
					echo "<label for='lettler_A'><b>A) </b> $alternativa_A</label><br>";

					echo "<input type='radio' id='lettler_B' name='lettler' value='B' class='input-radio' required>";
					echo "<label for='lettler_B'><b>B) </b> $alternativa_B</label><br>";

					echo "<input type='radio' id='lettler_C' name='lettler' value='C' class='input-radio' required>";
					echo "<label for='lettler_C'><b>C) </b> $alternativa_C</label><br>";

					echo "<input type='radio' id='lettler_D' name='lettler' value='D' class='input-radio' required>";
					echo "<label for='lettler_D'><b>D) </b> $alternativa_D</label><br>";

					if(!empty($alternativa_E)){
						echo "<input type='radio' id='lettler_E' name='lettler' value='E' class='input-radio' required>";
						echo "<label for='lettler_E'><b>E) </b> $alternativa_E</label><br>";	
					}	
				}	
				elseif($tipo == 2){

					if(!empty($alternativa_A))
						echo "<b>A) </b> $alternativa_A<br>";

					if(!empty($alternativa_B))
						echo "<b>B) </b> $alternativa_B<br>";

					if(!empty($alternativa_C))
						echo "<b>C) </b> $alternativa_C<br>";
				}

				echo "<button type='submit' value='1' id='btn-verificar' name='verifica'>Verificar</button>";
				echo "</form><div class='clear'></div>";

				if(isset($_POST["verifica"])){

					echo "<hr id='gabaritos'>";

					if($tipo == 1){
						$resposta = $_POST["lettler"];

						if($gabarito == $resposta){
							echo "<p class='resposta green'>Parabéns! Você acertou!</p>";
							$acertou = 's';
						}
						else{
							echo "<p class='resposta red'>Infelizmente você errou, a alternativa correta era a letra <strong>$gabarito</strong></p>";
							$acertou = 'n'; 
						}

						if(!empty($explicacao))
							echo"<br><p><b>Comentário do profess@r:</b><br><br>$explicacao</p>";
					}
					else{
						$resposta = 1;

						echo "<p>Respostas esperadas:</p><br>";
					
						if(!empty($alternativa_D))
							echo"<strong>A)</strong> $alternativa_D<br><br>";
					
						if(!empty($alternativa_E))
							echo"<strong>B)</strong> $alternativa_E<br><br>";
					
						if(!empty($gabarito))
							echo"<strong>C)</strong> $gabarito<br>";
					
						if(!empty($explicacao))
							echo"<br><p><b>Comentário do profess@r:</b><br><br>$explicacao</p>";

						$acertou = 's';
					}

					if(isset($_SESSION['id_usuario']))
						if(User::checksQuestionResolved($id_usuario, $id_questao) == 0)
							if(User::saveResolutionQuest($id_usuario, $id_questao, $resposta, $acertou, $id_materia) != 1)
								echo "<script>alert('Erro ao salvar o seu progresso, contate-nos para falar o que houve')</script>";	
				}

				echo "<hr>";
				echo "<a href='$areaquestoes' class='link'>Voltar para a Área de Questões</a>";
			?>

		</div>
		<div class="clear"></div>
	</section>
</main>