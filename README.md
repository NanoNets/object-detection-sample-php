<div align="center">
  <a href="https://nanonets.com/objectdetection/">
    <img src="https://nanonets.com/logo.png" alt="NanoNets Object Detection Python Sample" width="100"/>
    </a>
</div>

<h1 align="center">NanoNets Object Detection PHP Sample</h1>

| [Golang Sample](https://github.com/NanoNets/object-detection-sample-golang) | [Python Sample](https://github.com/NanoNets/object-detection-sample-python)| [Node.js Sample](https://github.com/NanoNets/object-detection-sample-nodejs) | [PHP Sample](https://github.com/NanoNets/object-detection-sample-php) |
| -------------------------- |--------------------------| --------------------------| --------------------------|
| [![](https://www.hugopicado.com/assets/golang.png)](https://github.com/NanoNets/object-detection-sample-golang) | [![](http://kata.coderdojo.com/images/thumb/e/ea/Python_logo.png/100px-Python_logo.png)](https://github.com/NanoNets/object-detection-sample-python) | [![](https://s3.amazonaws.com/openshift-hub/production/quickstarts/243/nodejs_custom.png?1456926624)](https://github.com/NanoNets/object-detection-sample-nodejs) | [![](https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/100px-PHP-logo.svg.png)](https://github.com/NanoNets/object-detection-sample-php) | 

** **

## Tracking the Millenium Falcon

Images and annotations taken from - https://github.com/bourdakos1/Custom-Object-Detection

Images consists of frames taken from a clip from Star Wars: The Force Awakens.
[![Watch the video](https://github.com/bourdakos1/Custom-Object-Detection/raw/master/screenshots/starwars_small.gif)](https://www.youtube.com/watch?v=xW2hpkoaIiM)

Annotations are present for each frame and have the same name as the image name. You can find the example to train a model in python and node, by updating the api-key and model id in corresponding file. There is also a pre-processed json annotations folder that are ready payload for nanonets api.


** **

# Build an Object Detector for the Millenium Falcon
 
### Step 1: Clone the Repo
```bash
git clone https://github.com/NanoNets/object-detection-sample-php.git
cd object-detection-sample-php
```

Need to install php-cli and php-curl:
Here are the command to do same on Ubuntu
```bash
sudo apt-get install php<version>-cli
sudo apt-get install php<version>-curl
```

for PHP5
```bash
sudo apt-get install php5-cli
sudo apt-get install php5-curl
```
for PHP7
```bash
sudo apt-get install php7.0-cli
sudo apt-get install php7.0-curl
```

### Step 2: Get your free API Key
Get your free API Key from http://app.nanonets.com/user/api_key

### Step 3: Set the API key as an Environment Variable
```bash
export NANONETS_API_KEY=YOUR_API_KEY_GOES_HERE
```

### Step 4: Create a New Model
```bash
php ./code/create-model.php
```
 >_**Note:** This generates a MODEL_ID that you need for the next step

### Step 5: Add Model Id as Environment Variable
```bash
export NANONETS_MODEL_ID=YOUR_MODEL_ID
```
 >_**Note:** you will get YOUR_MODEL_ID from the previous step

### Step 6: Upload the Training Data
The training data is found in ```images``` (image files) and ```annotations``` (annotations for the image files)
```bash
php ./code/upload-training.php
```

### Step 7: Train Model
Once the Images have been uploaded, begin training the Model
```bash
php ./code/train-model.php
```

### Step 8: Get Model State
The model takes ~2 hours to train. You will get an email once the model is trained. In the meanwhile you check the state of the model
```bash
php ./code/model-state.php
```

### Step 9: Make Prediction
Once the model is trained. You can make predictions using the model
```bash
php ./code/prediction.php PATH_TO_YOUR_IMAGE.jpg
```

**Sample Usage:**
```bash
php ./code/prediction.php ./images/videoplayback0051.jpg
```


*Note the php sample uses the comverted json instead of the xml payload for convenience purposes, hence it has no dependencies.*
