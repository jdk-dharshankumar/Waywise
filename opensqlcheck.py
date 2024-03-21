import folium
import mysql.connector

def get_coordinates(place_name):
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="Sridharsh@12",
        database="Waywise"
    )

    if conn.is_connected():
        cursor = conn.cursor()

        # Fetching data
        cursor.execute("SELECT latitude, longitude FROM Area WHERE area = %s", (place_name,))

        # Fetch the first row
        row = cursor.fetchone()

        if row:
            latitude, longitude = row
            print(f"Latitude: {latitude}, Longitude: {longitude}")
            return latitude, longitude
        else:
            print("Place not found in database")
            return None, None

        cursor.close()
        conn.close()

def highlight_place(place_name):
    # Retrieve coordinates from the database
    latitude, longitude = get_coordinates(place_name)
    
    if latitude is not None and longitude is not None:
        # Create a folium map centered at the specified coordinates
        my_map = folium.Map(location=[latitude, longitude], zoom_start=12)

        # Add a marker for the specified location
        folium.Marker(location=[latitude, longitude], popup=place_name).add_to(my_map)

        # Save the map to an HTML file
        my_map.save("map.html")

        # Open the map in the default web browser
        import webbrowser
        webbrowser.open("map.html")

# Example usage
place_name = input("Enter the place name: ")
highlight_place(place_name)