import mysql.connector

def get_coordinates(place_name):
    conn = mysql.connector.connect(
        host="localhost",
        user="root",
        password="Sridharsh@12",
        database="Waywise"
    )

    if conn.is_connected():
        # print("Connected to MySQL database")

        cursor = conn.cursor()

        # Fetching data
        cursor.execute("SELECT latitude, longitude FROM Area WHERE area = %s", (place_name,))

        # Fetch the first row
        row = cursor.fetchone()

        if row:
            latitude, longitude = row
            print(f"Latitude: {latitude}, Longitude: {longitude}")
        else:
            print("Place not found in database")

        cursor.close()
        conn.close()
        

# Example usage
place_name = input("Enter the place name: ")
get_coordinates(place_name)
