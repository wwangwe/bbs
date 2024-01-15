// Digital Clock
const checkTime = (i) => (i < 10 ? "0" + i : i);

const getTime = () => {
    const today = new Date();
    
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    
    // add zero in front of numbers < 10
    m = checkTime(m);
    s = checkTime(s);
    
    document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
    setTimeout(getTime, 1000);
};

document.addEventListener("DOMContentLoaded", getTime);


const getDay = () => {
    const today = new Date();
    
    let day = today.getDate();
    let month = today.getMonth() + 1;
    let year = today.getFullYear();

    const week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    let dayOfWeek = week[today.getDay()];
    
    // add zero in front of numbers < 10
    day = checkTime(day);
    month = checkTime(month);
    
    document.getElementById("day").innerHTML = dayOfWeek;
    document.getElementById("date").innerHTML = day + "-" + month + "-" + year;
    setTimeout(getDay, 1000);
}

document.addEventListener("DOMContentLoaded", getDay);

// Weather API
const apiKey = "84bedfaec65643489e7114518241501";
const url = `https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=Nairobi&aqi=no`;

const fetchWeather = async () => {
  const response = await fetch(url);
  const data = await response.json();
  console.log(data);
  document.getElementById("temp").innerHTML = data.current.temp_c + "°C";
  document.getElementById("weather").innerHTML = data.current.condition.text;
  document.getElementById("icon").src = data.current.condition.icon;
};

setTimeout(fetchWeather, 1000);
