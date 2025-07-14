import pandas as pd
from sklearn.preprocessing import StandardScaler
from sklearn.ensemble import RandomForestClassifier
import joblib  # For saving the trained model

#Advanced Dataset Prediction

# Load the dataset
dataAd = pd.read_csv('advancedDataset.csv')  # Read the dataset

# Separate features and target
XAd = dataAd.drop('Chances of Disease', axis=1)  # Features (excluding target column)
yAd = dataAd['Chances of Disease']  # Target variable

# Scale the features
scalerAd = StandardScaler()
X_scaledAd = scalerAd.fit_transform(XAd)  # Scale features to have mean 0 and variance 1

# Train the Random Forest model
rf_modelAd = RandomForestClassifier(n_estimators=100, random_state=42)  # Create Random Forest model
rf_modelAd.fit(X_scaledAd, yAd)  # Train the model

# Save the model and scaler for later use
joblib.dump(rf_modelAd, 'rf_modelAd.pkl')  # Save trained model
joblib.dump(scalerAd, 'scalerAd.pkl')  # Save scaler



#Regular Dataset Prediction


# Load the dataset
dataRe = pd.read_csv('RegularDataset.csv')  # Load the dataset

# Separate features and target
XRe = dataRe.drop('Chance of Disease', axis=1)  # Features (excluding target column)
yRe = dataRe['Chance of Disease']  # Target variable

# Scale the features
scalerRe = StandardScaler()
X_scaledRe = scalerRe.fit_transform(XRe)  # Scale features to have mean 0 and variance 1

# Train the Random Forest model
rf_modelRe = RandomForestClassifier(n_estimators=150, max_depth=10, random_state=42)  # Adjusted parameters for better performance
rf_modelRe.fit(X_scaledRe, yRe)  # Train the model

# Save the model and scaler for later use
joblib.dump(rf_modelRe, 'rf_modelRe.pkl')  # Save trained model
joblib.dump(scalerRe, 'scalerRe.pkl')  # Save scaler




# Function to predict chances of disease

def predictionAd(input_data):
    scaler = joblib.load('scalerAd.pkl')  # Load the saved scaler
    rf_model = joblib.load('rf_modelAd.pkl')  # Load the saved Random Forest model
    
    input_data_scaled = scaler.transform([input_data])  # Scale input data
    prediction = rf_model.predict(input_data_scaled)  # Predict using the trained model
    
    # Map prediction to message
    message = {
        1: "No risk of heart disease.",
        2: "Low risk of heart disease.",
        3: "Moderate risk of heart disease.",
        4: "High risk of heart disease.",
        5: "Critical risk of heart disease."
    }
    
    return prediction[0], message.get(prediction[0], "Unknown risk")  # Return prediction with message


def predictionRe(input_data):
    # Load the saved scaler and model
    scaler = joblib.load('scalerRe.pkl')
    rf_model = joblib.load('rf_modelRe.pkl')


    # Scale input data
    input_data_scaled = scaler.transform([input_data])  # Scale input data
    prediction = rf_model.predict(input_data_scaled)  # Predict using the trained model

    # Map prediction to message
    message = {
        1: "No risk of heart disease.",
        2: "Low risk of heart disease.",
        3: "Moderate risk of heart disease.",
        4: "High risk of heart disease.",
        5: "Critical risk of heart disease."
    }

    return prediction[0], message.get(prediction[0], "Unknown risk")
