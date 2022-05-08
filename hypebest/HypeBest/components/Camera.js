import React, { useState, useEffect } from 'react';
import { StyleSheet ,Text, View, Button, Image,TouchableOpacity} from 'react-native';
import { Camera } from 'expo-camera';

export default function App() {
  const [hasCameraPermission, setHasCameraPermission] = useState(null);
  const [camera, setCamera] = useState(null);
  const [image, setImage] = useState(null);
  const [type, setType] = useState(Camera.Constants.Type.back);
useEffect(() => {
    (async () => {
      const cameraStatus = await Camera.requestPermissionsAsync();
      setHasCameraPermission(cameraStatus.status === 'granted');
})();
  }, []);
const takePicture = async () => {
    if(camera){
        const data = await camera.takePictureAsync(null)
        setImage(data.uri);
    }
  }

  if (hasCameraPermission === false) {
    return <Text>No access to camera</Text>;
  }
  return (
   <View style={styles.container}>
      <Camera ref={ref => setCamera(ref)}
            style={styles.camera}
            type={type}
             ratio={'1:1'}  >
      <View style={styles.buttonContainer}>
      <TouchableOpacity
      style={styles.button}
            title="Flip Image"
            onPress={() => {
              setType(
                type === Camera.Constants.Type.back
                  ? Camera.Constants.Type.front
                  : Camera.Constants.Type.back
              );
            }}>
            <Text style={styles.text}> Flip </Text>
        </TouchableOpacity>
       <TouchableOpacity title="Take Picture" onPress={() => takePicture()} style={styles.buttonCamera} />
                    </View>
                          </Camera>
        {image && <Image source={{uri: image}} style={{flex:1}}/>}
   </View>
  );
}
const styles = StyleSheet.create({
  cameraContainer: {
      flex: 1,
      flexDirection: 'row'
  },
  fixedRatio:{
      flex: 1,
      aspectRatio: 1
  },

    container: {
    flex: 1,
  },
  camera: {
    flex: 1,
  },
  buttonContainer: {
    flex: 1,
    backgroundColor: 'transparent',
    flexDirection: 'row',
    margin: 20,
  },
  button: {
    flex: 0.1,
    alignSelf: 'flex-end',
    alignItems: 'center',
  },
  buttonCamera:{
    position:"absolute",
                width: 70,
            height: 70,
            bottom: 0,
            borderRadius: 50,
            borderWidth:2,
            borderColor:"black",
            backgroundColor: '#fff',
            left:"40%",
  },
  text: {
    fontSize: 18,
    color: 'white',
  },
})