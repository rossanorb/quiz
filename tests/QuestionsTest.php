<?php
session_start();
require ('Questions.php');

class QuestionsTest  extends PHPUnit_Framework_TestCase{

    private $q;


    public function testIfInstanteOfQuestions(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);
        $this->assertInstanceOf( Questions::class, $q);
    }

    public function testAnswers(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);

        $q->getNextQuestion();
        $q->setAnswer(1, 'd');
        $this->assertEquals($_SESSION['answers'][1], 'd');

        $q->getNextQuestion();
        $q->setAnswer(2, 'd');
        $this->assertEquals($_SESSION['answers'][2], 'd');

        $q->getNextQuestion();
        $q->setAnswer(3, 'c');
        $this->assertEquals($_SESSION['answers'][3], 'c');

        $q->getNextQuestion();
        $q->setAnswer(4, 'c');
        $this->assertEquals($_SESSION['answers'][4], 'c');

        $q->getNextQuestion();
        $q->setAnswer(5, 'a');
        $this->assertEquals($_SESSION['answers'][5], 'a');

        $this->assertEquals(count(array_filter($_SESSION['answers'], function($var){
            return ($var == 'd');
        })),2);

        $this->assertEquals(count(array_filter($_SESSION['answers'], function($var){
            return ($var == 'c');
        })),2);

        $this->assertEquals(count(array_filter($_SESSION['answers'], function($var){
            return ($var == 'a');
        })),1);


        $result = $q->getResult();
        $this->assertEquals('Breaking Bad',$result['serie']);
        
    }


    public function testAnswers1(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);

        $test = ['a','b','c','d','e'];
        for($i=0; $i < 5; $i++){
            $q->getNextQuestion();
            $q->setAnswer($i, $test[$i]);
        }
        $result = $q->getResult();
        $this->assertEquals('Silicon Valley',$result['serie']);
    }

    public function testAnswers2(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);

        $test = ['a','b','a','c','b'];
        for($i=0; $i < 5; $i++){
            $q->getNextQuestion();
            $q->setAnswer($i, $test[$i]);
        }
        $result = $q->getResult();
        $this->assertEquals('Game of Thrones',$result['serie']);
    }

    public function testAnswers4(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);

        $test = ['a','a','a','b','b'];
        for($i=0; $i < 5; $i++){
            $q->getNextQuestion();
            $q->setAnswer($i, $test[$i]);
        }
        $result = $q->getResult();
        $this->assertEquals('House of Cards',$result['serie']);
    }

    public function testAnswers5(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);

        $test = ['d','e','c','c','d'];
        for($i=0; $i < 5; $i++){
            $q->getNextQuestion();
            $q->setAnswer($i, $test[$i]);
        }
        $result = $q->getResult();
        $this->assertEquals('Breaking Bad',$result['serie']);
    }

    public function testAnswers6(){
        $config = $this->config();
        $q = new Questions($config['questions'], $config['series']);

        $test = ['c','a','a','b','c'];
        for($i=0; $i < 5; $i++){
            $q->getNextQuestion();
            $q->setAnswer($i, $test[$i]);
        }
        $result = $q->getResult();
        $this->assertEquals('Lost',$result['serie']);
    }



    private function config(){
        return [
          'questions' => [
              1 => [
                  1,
                  'De manhã, você:',
                  [
                      'a' => 'Acorda cedo e come frutas cortadas metodicamente',
                      'b' => 'Sai da cama com o despertador e se prepara para a batalha da semana',
                      'c' => 'Só consegue lembrar do seu nome depois do café',
                      'd' => 'Levanta e faz café pra todos da casa',
                      'e' => 'Passa o café e conserta um erro no HTML',
                  ]
              ],
              2 => [
                  2,
                  'Indo para o trabalho você encontra uma senhora idosa caída na rua',
                  [
                      'a' => 'Ela vai atrapalhar seu horário. Oculte o corpo',
                      'b' => 'Levanta a senhora e jura protegê-la com sua vida',
                      'c' => 'Ajuda-a, mas questiona sua real identidade',
                      'd' => 'Oferece para caminharem juntos até um destino em comum',
                      'e' => 'Testa se ela roda bem no Firefox. Não roda',
                  ]
              ],
              3 => [
                  3,
                  'Chega no prédio e o elevador está cheio',
                  [
                      'a' => 'Convence parte das pessoas a esperarem o próximo',
                      'b' => 'Ignora as pessoas no elevador e entra de qualquer forma',
                      'c' => 'Você questiona a realidade, as coisas e tudo mais. Sobe de escada',
                      'd' => 'Com uma leve intimidação passivo-agressiva, encontra um lugar no elevador',
                      'e' => 'Cria um app que mostra a lotação do elevador. Vende o app e fica milionário',
                  ]
              ],
              4 => [
                  4,
                  'Você chega no trabalho e as convenções sociais te obrigam a puxar assunto',
                  [
                      'a' => 'Fala sobre a política, eleições, como tudo é um absurdo',
                      'b' => 'Larga uma frase polêmica e vê uma pequena guerra se formar',
                      'c' => 'Puxa um assunto e te lembram que já foi discutido semana passada',
                      'd' => 'Sugere que os colegas trabalhem na ideia de um novo projeto',
                      'e' => 'Desabafa sobre como odeia PHP. Todo mundo na sala adora PHP',
                  ]
              ],
              5 => [
                  5,
                  'A pauta pegou o dia todo, mas você está indo para casa',
                  [
                      'a' => 'Vou chamar aqui o meu Uber',
                      'b' => 'Pegarei o bus junto com o resto do povo',
                      'c' => 'No ponto de ônibus mais uma vez, espero não errar a linha de novo',
                      'd' => 'Vou de carro, mas ofereço uma carona para os colegas',
                      'e' => 'Acho que descobri uma forma de fazer aquela senhora rodar no Firefox',
                  ]
              ]
          ],
          'series' => [
              'a' => ['serie'=>'House of Cards', 'msg'=>'Você é House of Cards: ataca o problema com método e faz de tudo para resolver a situação.'],
              'b' => ['serie'=>'Game of Thrones', 'msg'=>'Você é Game of Thrones: não tem muita delicadeza nas ações, mas resolve o problema de forma prática.'],
              'c' => ['serie'=>'Lost', 'msg'=>'Você é Lost: faz as coisas sem ter total certeza se é o caminho certo ou se faz sentido, mas no final dá tudo certo.'],
              'd' => ['serie'=>'Breaking Bad', 'msg'=>'Você é Breaking Bad: pra fazer acontecer você toma a liderança, mas sempre contando com seus parceiros.'],
              'e' => ['serie'=>'Silicon Valley', 'msg'=>'Você é Silicon Valley: vive a tecnologia o tempo todo e faz disso um mantra para cada situação no dia.']
          ]
        ];
    }




}