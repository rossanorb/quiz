<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Modal Quiz with Radio button - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
        .container-fluid{
            margin-top: 5%;
        }

        #qid {
            padding: 10px 15px;
            -moz-border-radius: 50px;
            -webkit-border-radius: 50px;
            border-radius: 20px;
        }

        label.btn {
            padding: 18px 60px;
            white-space: normal;
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            -o-transform: scale(1.0);
            -webkit-transition-duration: .3s;
            -moz-transition-duration: .3s;
            -o-transition-duration: .3s
        }

        label.btn:hover {
            text-shadow: 0 3px 2px rgba(0, 0, 0, 0.4);
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1)
        }

        label.btn-block {
            text-align: left;
            position: relative
        }

        label .btn-label {
            position: absolute;
            left: 0;
            top: 0;
            display: inline-block;
            padding: 0 10px;
            background: rgba(0, 0, 0, .15);
            height: 100%
        }

        label .glyphicon {
            top: 34%
        }

        .element-animation1 {
            animation: animationFrames ease .8s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease .8s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease .8s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation2 {
            animation: animationFrames ease 1s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation3 {
            animation: animationFrames ease 1.2s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.2s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.2s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation4 {
            animation: animationFrames ease 1.4s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.4s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.4s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        .element-animation5 {
            animation: animationFrames ease 1.6s;
            animation-iteration-count: 1;
            transform-origin: 50% 50%;
            -webkit-animation: animationFrames ease 1.6s;
            -webkit-animation-iteration-count: 1;
            -webkit-transform-origin: 50% 50%;
            -ms-animation: animationFrames ease 1.6s;
            -ms-animation-iteration-count: 1;
            -ms-transform-origin: 50% 50%
        }

        @keyframes animationFrames {
            0% {
                opacity: 0;
                transform: translate(-1500px, 0px)
            }

            60% {
                opacity: 1;
                transform: translate(30px, 0px)
            }

            80% {
                transform: translate(-10px, 0px)
            }

            100% {
                opacity: 1;
                transform: translate(0px, 0px)
            }
        }

        @-webkit-keyframes animationFrames {
            0% {
                opacity: 0;
                -webkit-transform: translate(-1500px, 0px)
            }
            60% {
                opacity: 1;
                -webkit-transform: translate(30px, 0px)
            }

            80% {
                -webkit-transform: translate(-10px, 0px)
            }

            100% {
                opacity: 1;
                -webkit-transform: translate(0px, 0px)
            }
        }

        @-ms-keyframes animationFrames {
            0% {
                opacity: 0;
                -ms-transform: translate(-1500px, 0px)
            }

            60% {
                opacity: 1;
                -ms-transform: translate(30px, 0px)
            }
            80% {
                -ms-transform: translate(-10px, 0px)
            }

            100% {
                opacity: 1;
                -ms-transform: translate(0px, 0px)
            }
        }

        .modal-header {
            background-color: transparent;
            color: inherit
        }

        .modal-body {
            min-height: 205px
        }

        .btn input[type="radio"]{
            position: absolute;
            clip: rect(0,0,0,0);
            pointer-events: none;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid bg-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                    <span class="label label-warning" id="qid"><?php echo $question[0]; ?></span>
                    <span style="line-height: 1.5em; "><?php echo $question[1]; ?></span>
                </h3>
            </div>
            <div class="modal-body">
                <div class="quiz" id="quiz" >
                    <form name="quiz" method="post" action="quiz.php">
                    <?php
                    $i = 0;
                    foreach ($question[2] as $index => $options):
                    ?>
                        <label class="element-animation<?php echo ++$i; ?> btn btn-lg btn-primary btn-block">
                            <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                            <input type="radio"  value="<?php echo $index; ?>">
                            <?php echo $options; ?>
                        </label>
                    <?php endforeach; ?>
                    <input type="hidden" id="q_answer" name="q_answer" value="">
                    <input type="hidden" id="q_id" name="q_id" value="<?php echo $question[0]; ?>">
                    </form>
                </div>
            </div>
            <div class="modal-footer text-muted">
                <span id="answer"></span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("label.btn").on('click', function () {
            let opt = $(this).find('input[type="radio"]').val();
            $('#q_answer').val( opt );
            $('form').submit();
        });
    });
</script>
</body>
</html>
