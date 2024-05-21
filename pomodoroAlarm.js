function Enable_Disable_Button(x, y, index)
{
    const booly = [true, false];
    document.getElementById(x).disabled = booly;
    document.getElementById(y).disabled = booly;
}

function Sleep(ms) 
{
    return new Promise(resolve => setTimeout(resolve, ms));
}

function DisplayTime(id_Hours, id_Minutes, id_Seconds, displayHours, displayMinutes, displaySeconds)
{
    document.getElementById(id_Hours).innerText = displayHours;
    document.getElementById(id_Minutes).innerText = displayMinutes;
    document.getElementById(id_Seconds).innerText = displaySeconds;
}

function AlarmDone(alertDescription) //fix sleep function
{
    document.getElementById("alarmAudio").play();
    //sleep(8000);

    alert(alertDescription);
            
    Enable_Disable_Button("studyButton", "breakButton", 1);
}

function pomodoroStudyAlarm() 
{
    var life = 5;

    Enable_Disable_Button("studyButton", "breakButton", 0);
    
    var h = parseInt(document.getElementById("study").value);
    var m = 0;
    var s = 0;

    var countdown = function () 
    {
        if (h == 0 && m == 0 && s == 0) 
        {
            AlarmDone("Take a break!");
            life++;
            document.getElementById("lifespan").innerText = life;
            return;
        }

        DisplayTime("h", "m", "s", h, m, s);
        document.getElementById("lifespan").innerText = life;

        if (m == 0 && s == 0) 
        {
            h--;
            m = 59;
            s = 59;
        } else if (s == 0) 
        {
            m--;
            s = 59;
        } else
            s--;

        setTimeout(countdown, 1000);
    };
    countdown();
}

function pomodoroBreakAlarm() 
{
    Enable_Disable_Button("studyButton", "breakButton", 0);
    
    var h = 0;
    //var m = parseInt(document.getElementById("break").value);
    var m = 0;
    var s = 2;

    var countdown = function () 
    {
        if (m == 0 && s == 0) 
        {
            AlarmDone("Study for Matmat's long and healthy life!!");
            return;
        }

        DisplayTime("bH", "bM", "bS", "00:", m, s);

        if (s == 0) 
        {
            m--;
            s = 59;
        } else
            s--;

        setTimeout(countdown, 1000);
    };
    countdown();
}