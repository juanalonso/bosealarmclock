# BoseAlarmClock
### Alarm clock for the Bose SoundTouch speaker

A very simple alarm clock using the Bose SoundTouch speakers' API. Tested only on the SoundTouch 10 model. Use at your own risk :-p

The idea behind this convoluted solution is to wake up with a different song everyday, with a nice fade in, so the volume does not startle you. The PHP script makes several requests to the speaker to change the preset, set the shuffle mode and gradually increase the volumen.

#### Configuration
Change the value of `$boseIP` so it points to the speaker you want to use as an alarm clock.

Change the value of `$preset` (1-6) so it points to the preset you want to listen to when the alarm goes off.

Schedule a cron job, launchd, IFTTT or whatever suits you best to execute the script.
