<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Soundtype">
    <meta name="description" content="Soundtype demo sayfası. Demolarını sayfadaki formu doldurarak gönderebilir, Discord sunumuz sayesinde feedback'ler alabilirsiniz. Her tür incelenmektedir.">
    <meta name="keywords" content="Soundtype, demo, prodüksiyon, parça, fl studio, studio one, trap, hiphop, rap, techno, house, deep house, trance, dubstep, beatmaker, producing, send demo, feedback, demo feedback, mustafa başal, beat, beats">
    <link rel="stylesheet" href="css/main.css">
    <title>Soundtype - Demo Formu</title>
</head>
<body>
    <div class="full-page">
        <?php
            $error = @$_GET['error'];
            $process = @$_GET['process'];
            if($error == 'NoName') {
                echo '<div class="container container-info container-info--error">
                        Lütfen ad soyad bilgisi giriniz.
                    </div>';
            }elseif($error == 'NoEmail'){
                echo '<div class="container container-info container-info--error">
                        Lütfen e-posta bilgisi giriniz.
                    </div>';
            }elseif($error == 'NoAbout'){
                echo '<div class="container container-info container-info--error">
                        Lütfen hakkımda bilgisi giriniz.
                    </div>';
            }elseif($error == 'NoDemoType'){
                echo '<div class="container container-info container-info--error">
                        Lütfen demo türü bilgisi giriniz.
                    </div>';
            }elseif($error == 'NoDemoURL'){
                echo '<div class="container container-info container-info--error">
                        Lütfen demo bağlantı bilgisi giriniz.
                    </div>';
            }
            
            if($process == 'sent'){
                echo '<div class="container container-info container-info--success">
                        Demo\'nuz başarıyla gönderildi!
                    </div>';
            }
        ?>
        
        <div class="container container-content">
            <div class="inner-container">
                <div class="inner-container__left">
                    <p class="inner-container__left__title">SOUNDTYPE</p>
                </div>
                <div class="inner-container__right">
                    <div class="inner-container__right__title">
                        <h1>Demo Gönderme Formu</h1>
                    </div>
                    <div class="inner-container__right__form">
                        <form action="mail.php" method="POST" class="inner-container__right__form">
                            <label>
                                <p>Ad ve Soyad</p>
                                <input class="form-element inputText" name="artistName" type="text" placeholder="Adınızı ve soyadınızı giriniz" required>
                            </label>
                            <label class="mt-1">
                                <p>E-Posta</p>
                                <input class="form-element inputText" type="text" name="artistMail" placeholder="E-posta adresinizi giriniz" required>
                            </label>
                            <label class="mt-1">
                                <p>Hakkımda</p>
                                <textarea class="form-element form-element__textarea" name="artistAbout" id="" cols="55" rows="6" placeholder="Kendinizden bahseder misiniz?" required></textarea>
                            </label>
                            <label>
                                <p>Demo Türü</p>
                                <input class="form-element inputText" type="text" name="demoType" placeholder="Demo'nuzun türünü giriniz. Ör: TRAP" required>
                            </label>
                            <label class="mt-1">
                                <p>SoundCloud Adresi</p>
                                <input class="form-element inputText" type="text" name="demoURL" placeholder="Demo'nuzun SoundCloud bağlantısını giriniz" required>
                            </label>
                            <input class="form-element form-element__submit mt-1" type="submit" name="demoGonder" value="Gönder">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-social">
            <ul class="social">
                <a href="https://www.youtube.com/channel/UCblEH3mVAVo0Sh7Y6yBUIcg" class="social-link"><li>YouTube</li></a>
                <a href="https://www.instagram.com/soundtype.co/" class="social-link"><li>Instagram</li></a>
                <a href="https://twitch.tv/mustafabasal" class="social-link"><li>Twitch</li></a>
                <a href="https://discord.gg/RNzKTgJ" class="social-link"><li>Discord</li></a>
            </ul>
        </div>
    </div>
</body>
</html>