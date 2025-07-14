from predict import predictionRe
import sys


# Function to get predefined input values
def predictionRegular():

    gender = sys.argv[1]
    age = sys.argv[2]
    height = sys.argv[3]
    weight = sys.argv[4]
    bmi = sys.argv[5]
    bp = sys.argv[6]
    heartrate = sys.argv[7]
    acidity = sys.argv[8]
    obesity = sys.argv[9]
    asthma = sys.argv[10]
    smoking = sys.argv[11]
    alcohol = sys.argv[12]
    fastbreathing = sys.argv[13]
    foodschedule = sys.argv[14]
    sleepingschedule = sys.argv[15]
    hypertension = sys.argv[16]
    hearthistory = sys.argv[17]
    stresslevel = sys.argv[18]

    # Prepare input data list
    input_data = [
        age, gender, height, weight, bp, heartrate, acidity, obesity, asthma, smoking, 
        alcohol, fastbreathing, foodschedule, sleepingschedule, bmi, hypertension, hearthistory, stresslevel
    ]

    predicted_chances, message = predictionRe(input_data)

    return predicted_chances  # Return the predefined input data


result = predictionRegular()
print(result)
  