<div class="scoreboards">
    <h2>Loading...</h2>
</div>

<script>
async function getScoreboard()
{
    var request = await fetch('index.php?realtime-request=true')
    var response = await request.json()

    var table = '<table class="table table-bordered">'
    table += '<thead>'
    table += '<tr>'
    table += '<td>Nama</td>'
    table += '<td>Nilai</td>'
    table += '</tr>'
    table += '</thead>'
    table += '<tbody>'
    for(var i=0;i<response.length;i++)
    {
        var data = response[i]
        table += '<tr>'
        table += '<td>'+data.name+'</td>'
        table += '<td>'+data.total_score+'</td>'
        table += '</tr>'
    }

    table += '</tbody></table>'

    document.querySelector('.scoreboards').innerHTML = '<div class="p-10 bg-white">'+table+'</div>'

    // console.log(response)
}

getScoreboard()
setInterval(getScoreboard,1000)
</script>