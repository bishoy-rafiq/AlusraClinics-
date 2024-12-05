$(document).ready(function () {
    $('#youtube_link').on('input', function () {
        var videoUrl = $(this).val();
        var videoId = getYouTubeVideoId(videoUrl);

        if (videoId) {
            var videoPreview = '<iframe width="300" src="https://www.youtube.com/embed/' + videoId + '" frameborder="0" allowfullscreen></iframe>';
            $('#video-preview').html(videoPreview);
        } else {
            $('#video-preview').html('');
        }
    });

    function getYouTubeVideoId(url) {
        var videoId = '';
        var match = url.match(/[?&]v=([^&]+)/);
        if (match) {
            videoId = match[1];
        } else {
            match = url.match(/youtu\.be\/([^&?]+)/); 
            if (match) {
                videoId = match[1];
            } else {
                match = url.match(/\/(?:embed|v|watch)\??(?:[^&]+&)*v?=?([^&]+)$/); // Match various YouTube URL formats
                if (match) {
                    videoId = match[1];
                } else {
                    match = url.match(/(?:\/|%3D|v=|vi=)([0-9A-z_-]{11})(?:[^&\n%\?#]{0,}|\s|$)/); // Match additional YouTube URL formats
                    if (match) {
                        videoId = match[1];
                    }
                }
            }
        }
        return videoId;
    }
    
    
});