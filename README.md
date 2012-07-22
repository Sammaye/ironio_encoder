iio_encoder
===========

An example video encoder for iron.io PHP API

## Running it

Simply open a console window and type:

`php iio_encoder_runner.php`

Be sure to replace the configuration values in the runner (such as the AWS key, secret and bucket) with your own for it to work. You will also need to replace the `config.ini` with one
of your own.

## Limitations

The main limitation is the encoding speed and duration. The speed of encoding on iron.io's network is not great (was expecting more from a job server) and also the 1 hour limitation on
runtime makes it impossible to encode large files.

Another limitation to take into consideration is that iron.io does not include `libx264` within their server setup. They do however provide many other custom ffmpeg libraries, especially
the ones needed for decent `ogg` encoding.

## Requirements

- A input video file. Any video file.
- The AWS PHP API SDK place within `/workers/ffmpeg/aws`