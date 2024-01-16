# example/views.py
import pytz
import requests
from datetime import datetime
from django.shortcuts import render

def index(request):
    apiKey = '84bedfaec65643489e7114518241501'
    url = 'https://api.weatherapi.com/v1/current.json?key=' + apiKey + '&q=Nairobi&aqi=no'
    timezone = pytz.timezone('Africa/Nairobi')
    now = datetime.now(timezone)
    
    response = requests.get(url)
    data = response.json()
    context = {
        'location': data['location']['name'],
        'temp': data['current']['temp_c'],
        'condition': data['current']['condition']['text'],
        'icon': data['current']['condition']['icon'],
        'time': now.strftime('%H:%M'),
        'date': now.strftime('%Y-%m-%d'),
        'day': now.strftime('%A'),
    }
    return  render(request, 'livescreen/index.html', context)