# example/views.py
from datetime import datetime
from django.shortcuts import render
import requests

def index(request):
    apiKey = '84bedfaec65643489e7114518241501'
    url = 'https://api.weatherapi.com/v1/current.json?key=' + apiKey + '&q=Nairobi&aqi=no'
    
    response = requests.get(url)
    data = response.json()
    context = {
        'location': data['location']['name'],
        'temp': data['current']['temp_c'],
        'condition': data['current']['condition']['text'],
        'icon': data['current']['condition']['icon'],
        'time': datetime.now().strftime('%H:%M'),
        'date': datetime.now().strftime('%Y-%m-%d'),
        'day': datetime.now().strftime('%A'),
    }
    return  render(request, 'livescreen/index.html', context)