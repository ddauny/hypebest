import React from "react";
import { Dimensions, TextInput,Image} from "react-native";
import { TouchableOpacity } from "react-native";
import { Text,View,StyleSheet } from "react-native";

import back from "../assets/back1.png";
const {width,height} =Dimensions.get("window");

export default function Accedi(){
  return (
    <View style={styles.mainContainer}>
      <Image source={back} style={styles.backImage}/>
      <View style={styles.whiteSheet} />
      <View style={styles.container} >
        <Text style={styles.title}>Hello</Text>
        <Text style={styles.subTitle}>Accedi per entrare nel tuo account</Text>
        <TextInput style={styles.textInput} placeholder="salbeo@gmail.com"></TextInput>
        <TextInput style={styles.textInput} placeholder="***********" secureTextEntry={true}></TextInput>

        <TouchableOpacity style={styles.buttonAccedi}>
          <Text style={{color:"black",fontWeight: "bold",fontSize: 20,}} >Accedi</Text>
        </TouchableOpacity>
        <TouchableOpacity style={styles.buttonRegistrati}>
          <Text style={{color:"red",fontWeight: "bold",fontSize: 20,}}>Registrati</Text>
        </TouchableOpacity>
        {/* <View style={styles.separator} lightColor="#eee" darkColor="rgba(255,255,255,0.1)" /> */}
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  mainContainer: { flex: 1},
  container: {
    alignItems: "center",
    justifyContent: "center",
    // backgroundColor: "#f1f1f1",
    flex:1,
    // width:width,
    // height:height,
  },
  backImage:{
    width:"100%",
    height: 340,
    position: "absolute",
    top:0,
    resizeMode:"cover",
  },
  whiteSheet:{
    width:"100%",
    height:"80%",
    position:"absolute",
    bottom:0,
    backgroundColor:"#fff",
    borderTopLeftRadius:60,
  },
  title: {
    fontSize: 80,
    fontWeight: "bold",
  },
  subTitle: {
    fontSize: 20,
  },
  textInput: {
    // borderWidth:1,
    // borderColor: "gray",
    width: "80%",
    height: 50,
    padding: 10,
    // paddingStart: 30,
    marginTop: 10,
    borderRadius: 13,
    textAlign:"center",
    backgroundColor: "#f6f7fb",
    // alignItems: "center",
    // justifyContent: "center",
  },
  buttonAccedi: {
    width: "80%",
    height: 50,
    marginTop: 50,
    borderRadius: 13,
    backgroundColor: "#c82a1e",
    alignItems: "center",
    justifyContent: "center",
    
    borderWidth:1,
    borderColor: "red",
    
  },
  buttonRegistrati: {
    width: "80%",
    height: 50,
    marginTop: 10,
    borderRadius: 13,
    backgroundColor: "#fff",
    borderWidth:1,
    borderColor: "red",
    alignItems: "center",
    justifyContent: "center",
  },
});
