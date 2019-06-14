<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:image" content="https://raw.githubusercontent.com/naomiaro/waveform-playlist/master/img/stemtracks.png">
  <meta property="og:image:height" content="401">
  <meta property="og:image:width" content="1039">

  <title>Web Voice Recorder</title>

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/main.css">
</head>


  <body>

    <header class="site-header">

</header>


    <div class="container">
  <div class="wrapper">
    <article class="post">
      <header class="post-header">
        <h1 class="post-title">Web Voice Recorder</h1>
        <p class="lead">Every control and state available.</p>
      </header>
      <div class="post-content">
        <div id="top-bar" class="playlist-top-bar">
  <div class="playlist-toolbar">
    <div class="btn-group">
      <span class="btn-pause btn btn-warning">
        <i class="fa fa-pause"></i>
      </span>
      <span class="btn-play btn btn-success">
        <i class="fa fa-play"></i>
      </span>
      <span class="btn-stop btn btn-danger">
        <i class="fa fa-stop"></i>
      </span>
      <span class="btn-rewind btn btn-success">
        <i class="fa fa-fast-backward"></i>
      </span>
      <span class="btn-fast-forward btn btn-success">
        <i class="fa fa-fast-forward"></i>
      </span>
      <span class="btn-record btn btn-danger disabled">
        <i class="fa fa-microphone"></i>
      </span>
    </div>
    <div class="btn-group">
      <span title="zoom in" class="btn-zoom-in btn btn-default">
        <i class="fa fa-search-plus"></i>
      </span>
      <span title="zoom out" class="btn-zoom-out btn btn-default">
        <i class="fa fa-search-minus"></i>
      </span>
    </div>
    <div class="btn-group btn-playlist-state-group">
      <span class="btn-cursor btn btn-default active" title="select cursor">
        <i class="fa fa-headphones"></i>
      </span>
      <span class="btn-select btn btn-default" title="select audio region">
        <i class="fa fa-italic"></i>
      </span>
      <span class="btn-shift btn btn-default" title="shift audio in time">
        <i class="fa fa-arrows-h"></i>
      </span>
      <span class="btn-fadein btn btn-default" title="set audio fade in">
        <i class="fa fa-long-arrow-left"></i>
      </span>
      <span class="btn-fadeout btn btn-default" title="set audio fade out">
        <i class="fa fa-long-arrow-right"></i>
      </span>
    </div>
    <div class="btn-group btn-fade-state-group">
      <span class="btn btn-default btn-logarithmic active">logarithmic</span>
      <span class="btn btn-default btn-linear">linear</span>
      <span class="btn btn-default btn-exponential">exponential</span>
      <span class="btn btn-default btn-scurve">s-curve</span>
    </div>
    <div class="btn-group btn-select-state-group">
      <span class="btn-loop btn btn-success disabled" title="loop a selected segment of audio">
        <i class="fa fa-repeat"></i>
      </span>
      <span title="keep only the selected audio region for a track"
            class="btn-trim-audio btn btn-primary disabled">Trim</span>
      <span title="delete the selected audio region for a track"
            class="btn-delete-audio btn btn-primary disabled">Delete</span>
    </div>
    <div class="btn-group">
      <span title="Prints playlist info to console"
            class="btn btn-info">Print</span>
      <span title="Clear the playlist's tracks" class="btn btn-clear btn-danger">Clear</span>
    </div>
    <div class="btn-group">
      <span title="Download the current work as Wav file" class="btn btn-download btn-primary">
        <i class="fa fa-download"></i>
      </span>
    </div>
  </div>
</div>
<div id="playlist"></div>
<div class="playlist-bottom-bar">
  <form class="form-inline">
  <select class="time-format form-control">
    <option value="seconds">seconds</option>
    <option value="thousandths">thousandths</option>
    <option value="hh:mm:ss">hh:mm:ss</option>
    <option value="hh:mm:ss.u">hh:mm:ss + tenths</option>
    <option value="hh:mm:ss.uu">hh:mm:ss + hundredths</option>
    <option value="hh:mm:ss.uuu" selected="selected">hh:mm:ss + milliseconds</option>
  </select>
  <input type="text" class="audio-start input-small form-control">
  <input type="text" class="audio-end form-control">
  <label class="audio-pos">00:00:00.0</label>
</form>

  <form class="form-inline">
    <div class="form-group">
      <label for="master-gain">Master Volume</label>
      <input type="range" min="0" max="100" value="100" class="master-gain form-control" id="master-gain">
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" class="automatic-scroll"> Automatic Scroll
      </label>
    </div>
  </form>
  <form class="form-inline">
    <div class="control-group">
      <label for="time">Seek to time :</label>
      <input type="number" class="form-control" value="14" id="seektime"/>
      <span class="btn btn-primary btn-seektotime">Seek !</span>
    </div>
  </form>
  <div class="sound-status"></div>
  <div class="track-drop"></div>
  <div class="loading-data"></div>
</div>

      </div>
    </article>
  </div>
</div>



<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/MediaStreamRecorder.min.js"></script>
<script type="text/javascript" src="js/waveform-playlist.var.js"></script>
<script type="text/javascript" src="js/web-audio-editor.js"></script>
<script type="text/javascript" src="js/emitter.js"></script>



  </body>

</html>