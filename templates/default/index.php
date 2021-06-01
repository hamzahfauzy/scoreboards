<div class="scoreboards">
    <h2>Menunggu...</h2>
</div>

<script>
var countdown
async function getScoreboard()
{
    var request = await fetch('index.php?realtime-request=true')
    var response = await request.text()

    if(response)
    {
        response = JSON.parse(response)
        var timer = 5
        document.querySelector('.scoreboards').innerHTML = '<h2>'+timer+'</h2>'
        countdown = setInterval(e=>{
            timer--
            if(timer == 0)
            {
                clearInterval(countdown)
                document.querySelector('.scoreboards').innerHTML = '<h2>'+response.name+' ('+response.total_score+')</h2>'
                setTimeout(e => {
                    document.querySelector('.scoreboards').innerHTML = '<h2>Menunggu...</h2>'
                }, 10000)
            }
            else
                document.querySelector('.scoreboards').innerHTML = '<h2>'+timer+'</h2>'
        },1000)
        // var table = '<table class="table table-bordered">'
        // table += '<thead>'
        // table += '<tr>'
        // table += '<td>Nama</td>'
        // table += '<td>Nilai</td>'
        // table += '</tr>'
        // table += '</thead>'
        // table += '<tbody>'
        // table += '<tr>'
        // table += '<td>'+response.name+'</td>'
        // table += '<td>'+response.total_score+'</td>'
        // table += '</tr>'

        // table += '</tbody></table>'

        // document.querySelector('.scoreboards').innerHTML = '<div class="p-10 bg-white">'+table+'</div>'
    }


    // console.log(response)
}

getScoreboard()
setInterval(getScoreboard,1000)
</script>