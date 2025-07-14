from predict import predictionAd, predictionRe

# Function to get predefined input values
def get_user_inputAd():
    # User input is commented out for testing
    """
    age = int(input("Enter age: "))
    gender = input("Enter gender (Male/Female): ")
    height = int(input("Enter height (cm): "))
    weight = int(input("Enter weight (kg): "))
    chest_pain = input("Enter type of chest pain (No Pain/ATA/ASY/NAP): "))
    blood_pressure = int(input("Enter blood pressure rate (mmHg): "))
    heart_rate = int(input("Enter heart rate (bpm): "))
    ldl_cholesterol = int(input("Enter LDL cholesterol (mg/dL): "))
    hdl_cholesterol = int(input("Enter HDL cholesterol (mg/dL): "))
    acidity = int(input("Enter acidity (0/1): "))
    obesity = int(input("Enter obesity (0/1): "))
    asthma = int(input("Enter asthma (0/1): "))
    smoking = int(input("Enter smoking (0/1): "))
    alcohol = int(input("Enter alcohol (0/1): "))
    sleeping_schedule = input("Enter sleeping schedule (Good/Normal/Poor): "))
    hypertension = int(input("Enter hypertension (0/1): "))
    bmi = float(input("Enter body mass index (kg/m²): "))
    blood_sugar = float(input("Enter blood sugar (mg/dL): "))
    heart_disease_history = int(input("Enter history of heart disease (0/1): "))
    stress_level = input("Enter stress level (Low/Moderate/High): ")
    """

    # Assigning predefined values for testing
    age = 21
    gender = 1  # Male
    height = 170
    weight = 69
    chest_pain = 3  # 0 = No Pain, 1 = ASY, 2 = NAP, 3 = ATA
    blood_pressure = 185
    heart_rate = 110
    ldl_cholesterol = 110
    hdl_cholesterol = 70
    acidity = 1
    obesity = 0
    asthma = 1
    smoking = 6
    alcohol = 4
    sleeping_schedule = 2  # 0 = Good, 1 = Normal, 2 = Poor
    hypertension = 1
    bmi = 33.8
    blood_sugar = 147
    heart_disease_history = 1
    stress_level = 0  # 0 = Low, 1 = Moderate, 2 = High

    # Prepare input data list
    input_data = [
        age, gender, height, weight, chest_pain, blood_pressure, heart_rate,
        ldl_cholesterol, hdl_cholesterol, acidity, obesity, asthma, smoking, alcohol,
        sleeping_schedule, hypertension, bmi, blood_sugar, heart_disease_history, stress_level
    ]

    return input_data  # Return the predefined input data

# Function to display the result
def display_resultAd(predicted_chances, message):
    print(f"Predicted Chances of Disease for Advanced: {predicted_chances}")
    print(f"Message: {message}")

# Main function
def mainAd():
    input_data = get_user_inputAd()  # Get predefined input data
    predicted_chances, message = predictionAd(input_data)  # Predict disease risk
    display_resultAd(predicted_chances, message)  # Display the result



def get_user_inputRe():
    # Assigning predefined numeric values for testing
    age = 60
    gender = 0  # Male = 0, Female = 1
    height = 170  # in cm
    weight = 55  # in kg
    blood_pressure_rate = 180  # systolic BP
    heart_beat = 120  # beats per minute
    acidity = 1  # No = 0, Yes = 1
    obesity = 1  # No = 0, Yes = 1
    asthma = 0  # No = 0, Yes = 1
    smoking = 7  # No. of times smoking in a day (0 means no smoking)
    alcohol = 5  # No. of times alcohol in a week (0 means no alcohol)
    fast_breathing_during_walking = 1  # No = 0, Yes = 1
    food_schedule = 2  # Good = 0, Normal = 1, Poor = 2
    sleeping_schedule = 2  # Good = 0, Normal = 1, Poor = 2
    body_mass_index = 22.26  # BMI value
    hypertension = 1  # No = 0, Yes = 1
    history_of_heart_disease = 1  # No = 0, Yes = 1
    stress_level = 1  # Low = 0, Moderate = 1, High = 2

    # Prepare input data list
    input_data = [
        age, gender, height, weight, blood_pressure_rate, heart_beat, acidity,
        obesity, asthma, smoking, alcohol, fast_breathing_during_walking,
        food_schedule, sleeping_schedule, body_mass_index, hypertension,
        history_of_heart_disease, stress_level
    ]

    return input_data  # Return the predefined input data

# Function to display the result
def display_resultRe(prediction_result):
    print(f"Predicted Chances of Disease for Regular: {prediction_result['predicted_class']}")
    print(f"Message: {prediction_result['risk_message']}")

# Main function
def mainRe():
    input_data = get_user_inputRe()  # Get predefined input data
    prediction_result = predictionRe(input_data)  # Predict disease risk
    display_resultRe(prediction_result)  # Display the result














check=0

while(check!=3):
    print("1. Advanced Dataset ")
    print("2. Regular Dataset ")
    print("3. Exit Dataset ")
    choice = int(input("Enter your choice : "))
    
    if(choice==1):
        mainAd()
    elif(choice==2):
        mainRe()
    elif(choice==3):
        exit()
    else:
        print("Invalid Number")
