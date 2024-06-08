function Enable_Disable_Button(x, y, z, index)
{
    let booly = [true, false];
    document.getElementById(x).disabled = booly[index];
    document.getElementById(y).disabled = booly[index];
    document.getElementById(z).disabled = booly[index];
}

function Sleep(ms) 
{
    return new Promise(resolve => setTimeout(resolve, ms));
}

function DisplayTime(id_Minutes, id_Seconds, displayMinutes, displaySeconds)
{
    document.getElementById(id_Minutes).innerText = displayMinutes;
    document.getElementById(id_Seconds).innerText = displaySeconds;
}

function pomodoroStudyAlarm() 
{
    Enable_Disable_Button("studyButton", "shortBreakButton", "longBreakButton", 0);
    
    var m = parseInt(document.getElementById("study").value);
    //var m = 0;
    var s = 0;

    var countdown = function () 
    {
        if (m == 0 && s == 0) 
        {
            //document.getElementById("x").innerText = "alarmed";
            AlarmDone("Take a break!");
            return;
        }
        
        if (s == 0) 
            {
                m--;
                s = 59;
            } else
                s--;

        setTimeout(countdown, 1000);

        //document.getElementById("x").innerText = "displayed";
        DisplayTime("m", "s", m, s);
    };
    countdown();
}

function pomodoroShortBreakAlarm(index) 
{
    Enable_Disable_Button("studyButton", "shortBreakButton", "longBreakButton", 0);
    
    var m = parseInt(document.getElementById("shortBreak").value);
    //var m = 0;
    var s = 0;

    var countdown = function () 
    {
        if (m == 0 && s == 0) 
        {
            AlarmDone("Study for Matmat's long and healthy life!!");
            //document.getElementById("x").innerText = "alarmed";
            return;
        }

        if (s == 0) 
        {
            m--;
            s = 59;
        } else
            s--;

        setTimeout(countdown, 1000);

        //document.getElementById("x").innerText = "displayed";
        DisplayTime("shortBreakMinutes", "shortBreakSeconds", m, s);

    };
    countdown();
}

function pomodoroLongBreakAlarm(index) 
{
    Enable_Disable_Button("studyButton", "shortBreakButton", "longBreakButton", 0);
    
    var m = parseInt(document.getElementById("longBreak").value);
    //var m = 0;
    var s = 0;

    var countdown = function () 
    {
        if (m == 0 && s == 0) 
        {
            AlarmDone("Study for Matmat's long and healthy life!!");
            //document.getElementById("x").innerText = "alarmed";
            return;
        }

        if (s == 0) 
        {
            m--;
            s = 59;
        } else
            s--;

        setTimeout(countdown, 1000);

        //document.getElementById("x").innerText = "displayed";
        DisplayTime("longBreakMinutes", "longBreakSeconds", m, s);

    };
    countdown();
}

function AlarmDone(alertDescription) //fix sleep function
{
    document.getElementById("alarmAudio").play();
    //sleep(8000);

    alert(alertDescription);
            
    Enable_Disable_Button("studyButton", "shortBreakButton", "longBreakButton", 1);
}