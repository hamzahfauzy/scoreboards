<div class="fireworks-container"></div>
<div class="scoreboards">
    <h2>Menunggu...</h2>
</div>
<style>
.fireworks-container {position: fixed;left: 0;top: 0;width: 100%;height: 100%;background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;z-index: -10;
}

.scoreboards h2 {
    font-size:100px;
}

</style>
<script type="text/javascript" src="assets/js/fireworks.js"></script>
<script>
const container = document.querySelector('.fireworks-container')

const fireworks = new Fireworks({
    target: container,
    hue: 120,
    startDelay: 1,
    minDelay: 20,
    maxDelay: 30,
    speed: 4,
    acceleration: 1.05,
    friction: 0.98,
    gravity: 1,
    particles: 200,
    trace: 3,
    explosion: 10,
    boundaries: {
        top: 50,
        bottom: container.clientHeight,
        left: 50,
        right: container.clientWidth
    },
    sound: {
        enable: true,
        list: [
            'assets/sounds/fireworks-boom-1.mp3',
            'assets/sounds/fireworks-boom-2.mp3',
            'assets/sounds/fireworks-whistle-1.mp3'
        ],
        min: 4,
        max: 8
    }
})

var countdown, scoreboardInterval
async function getScoreboard()
{
    var request = await fetch('index.php?realtime-request=true');
    var response = await request.text();

    if(response)
    {
        const claps = new Audio("assets/sounds/claps.mp3");
        clearInterval(scoreboardInterval)
        response = JSON.parse(response)
        var timer = 5
        document.querySelector('.scoreboards').innerHTML = '<h2>'+timer+'</h2>'
        countdown = setInterval(e=>{
            // sound play here
            timer--
            if(timer == 0)
            {
                clearInterval(countdown)
                document.querySelector('.scoreboards').innerHTML = '<span style="font-size:'+response.setting.nama_peserta+'">'+response.name+'</span><br><span style="font-size:'+response.setting.kategori+'">'+response.category.name+'</span><br><span style="font-size:'+response.setting.skor+'">'+response.total_score+'</span><br><span style="font-size:'+response.setting.predikat+'">'+response.predikat+'</span>'
                $new_timeout = 2 * 60 * 1000;
                claps.play();
                fireworks.start();

                setTimeout(e => {
                    document.querySelector('.scoreboards').innerHTML = '<h2>Menunggu...</h2>'
                    // scoreboardInterval = setInterval(getScoreboard,1000)
                    fireworks.stop();
                    getScoreboard()
                }, $new_timeout = 30000)
            }
            else
                document.querySelector('.scoreboards').innerHTML = '<span style="font-size:'+response.setting.countdown+'">'+timer+'</span>'
        },1000)
    }
    else
    {
        setTimeout(getScoreboard,1000)
    }
}

getScoreboard()
// scoreboardInterval = setInterval(getScoreboard,1000)
</script>