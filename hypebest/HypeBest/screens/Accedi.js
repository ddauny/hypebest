import React from "react";
import { Dimensions, TextInput } from "react-native";
import { TouchableOpacity } from "react-native";
import { Text,View,StyleSheet } from "react-native";

const {width,height} =Dimensions.get("window");

export default function Accedi(){
  return (
    <View style={styles.mainContainer}>
      <View style={styles.container} >
        <Text style={styles.title}>Hello</Text>
        <Text style={styles.subTitle}>Accedi per entrare nel tuo account</Text>
        <TextInput style={styles.textInput} placeholder="salbeo@gmail.com"></TextInput>
        <TextInput style={styles.textInput} placeholder="***********" secureTextEntry={true}></TextInput>

        <TouchableOpacity style={styles.buttonAccedi}>
          <Text >Accedi</Text>
        </TouchableOpacity>
        <TouchableOpacity style={styles.buttonRegistrati}>
          <Text>Registrati</Text>
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
    borderRadius: 30,
    textAlign:"center",
    backgroundColor: "#fff",
    // alignItems: "center",
    // justifyContent: "center",
  },
  buttonAccedi: {
    width: "80%",
    height: 50,
    marginTop: 50,
    borderRadius: 30,
    backgroundColor: "#fff",
    alignItems: "center",
    justifyContent: "center",
    //     borderWidth:1,
    // borderColor: "gray",
    
  },
  buttonRegistrati: {
    width: "80%",
    height: 50,
    marginTop: 10,
    borderRadius: 30,
    backgroundColor: "#fff",
    //     borderWidth:1,
    // borderColor: "gray",
    alignItems: "center",
    justifyContent: "center",
  },
});
