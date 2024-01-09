<!DOCTYPE html>
    <head>
        <title>Live Meeting</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.7/css/bootstrap.css" />
		<link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.7/css/react-select.css" />
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
         <!-- import ZoomMtg dependencies -->
	    <script src="https://source.zoom.us/1.7.7/lib/vendor/react.min.js"></script>
	    <script src="https://source.zoom.us/1.7.7/lib/vendor/react-dom.min.js"></script>
	    <script src="https://source.zoom.us/1.7.7/lib/vendor/redux.min.js"></script>
	    <script src="https://source.zoom.us/1.7.7/lib/vendor/redux-thunk.min.js"></script>
	    <script src="https://source.zoom.us/1.7.7/lib/vendor/jquery.min.js"></script>
	    <script src="https://source.zoom.us/1.7.7/lib/vendor/lodash.min.js"></script>

	    <!-- import ZoomMtg -->
	    <script src="https://source.zoom.us/zoom-meeting-1.7.7.min.js"></script>
        <script>
            ZoomMtg.preLoadWasm();
            ZoomMtg.prepareJssdk();
            var meetConfig = {
                apiKey: "{{ env("ZOOM_API_KEY") }}",
                apiSecret: "{{ env("ZOOM_API_SECRET") }}",
                meetingNumber: {{ $mettingid }},
                userName: "{{ Auth::User()->name }}",
                passWord: "{{ $password }}",
                leaveUrl: "{{ route('zoom.callback',$mettingid) }}",
                role: 1
            };
            var signature = ZoomMtg.generateSignature({
                meetingNumber: meetConfig.meetingNumber,
                apiKey: meetConfig.apiKey,
                apiSecret: meetConfig.apiSecret,
                role: meetConfig.role,
                success: function(res){
                    console.log(res.result);
                }
            });
            ZoomMtg.init({
                leaveUrl: meetConfig.leaveUrl,
                isSupportAV: true,
                success: function () {
                    ZoomMtg.join(
                        {
                            meetingNumber: meetConfig.meetingNumber,
                            userName: meetConfig.userName,
                            signature: signature,
                            apiKey: meetConfig.apiKey,
                            passWord: meetConfig.passWord,
                            success: function(res){
                                $('#nav-tool').hide();
                            },
                            error: function(res) {
                                console.log(res);
                            }
                        }
                    );
                },
                error: function(res) {
                    console.log(res);
                }
            });
        </script>
    </body>
</html>
