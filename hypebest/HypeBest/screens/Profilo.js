import React from "react";
import { Text,View,StyleSheet } from "react-native";
import ProfileHeader from "../components/ProfileHeader";
import { auth } from "../firebase"
import Post from "../components/Post"

export default function Profilo(props){
  return (
    <View style={styles.container}>
      <ProfileHeader style={styles.header} user={props}/>
      <Post altezza={50} larghezza={50} username={"Marco"} descrizione="sjahdaskdkjsahdjasdkjahsd" />

    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    top:0,
  },
  header:{
    position:"absolute",
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
});
