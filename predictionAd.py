from predict import predictionAd
import sys


# Function to get predefined input values
def predictionAdvanced():

    gender = sys.argv[1]
    age = sys.argv[2]
    height = sys.argv[3]
    weight = sys.argv[4]
    bmi = sys.argv[5]
    chest_pain = sys.argv[6]
    blood_pressure = sys.argv[7]
    heart_rate = sys.argv[8]
    ldl_cholesterol = sys.argv[9]
    hdl_cholesterol = sys.argv[10]
    acidity = sys.argv[11]
    obesity = sys.argv[12]
    asthma = sys.argv[13]
    smoking = sys.argv[14]
    alcohol = sys.argv[15]
    sleeping_schedule = sys.argv[16]
    hypertension = sys.argv[17]
    blood_sugar = sys.argv[18]
    heart_disease_history = sys.argv[19]
    stress_level = sys.argv[20]

    # Prepare input data list
    input_data = [
        age, gender, height, weight, chest_pain, blood_pressure, heart_rate,
        ldl_cholesterol, hdl_cholesterol, acidity, obesity, asthma, smoking, alcohol,
        sleeping_schedule, hypertension, bmi, blood_sugar, heart_disease_history, stress_level
    ]

    predicted_chances, message = predictionAd(input_data)

    return predicted_chances  # Return the predefined input data


result = predictionAdvanced()
print(result)
  
