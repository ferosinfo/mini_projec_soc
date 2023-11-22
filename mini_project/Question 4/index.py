import requests
import pandas as pd

url = "https://wft-geo-db.p.rapidapi.com/v1/geo/cities"

headers = {
    "X-RapidAPI-Key": "29c4c89508msh96664ce84f41c3cp10adc7jsn6e57f68d244b",
    "X-RapidAPI-Host": "wft-geo-db.p.rapidapi.com"
}

params = {
    "countryIds": "NZ"  # Filter by New Zealand
}

response = requests.get(url, headers=headers, params=params)

data = response.json()["data"]

# Extracting necessary information
places_data = [{
    "place_id": place["id"],
    "place_name": place["name"],
    "place_type": place["type"],
    "region_code": place["regionCode"]
} for place in data]

# Creating a DataFrame using pandas
df = pd.DataFrame(places_data)

# Displaying the DataFrame
print(df)
