import React from "react";

import { Text, View, StyleSheet, Image } from "react-native";
import logo from '../assets/icon.png';
export default function ProfileHeader(props) {
  const { user } = props;

  return (
    <View style={styles.container}>
      <View style={styles.header}>
        <Image
          style={styles.userPictur}
          source={logo}
        />
        <Text>Username {'\n'}</Text>
        
        <Text>Bio</Text>
      </View>


      <View style={styles.strisciaNumeri}>
        <View style={styles.strisciaContent}>
          <Text>0</Text>
          <Text>Followers</Text>
        </View>


        <View style={styles.strisciaContent}>
          <Text>0</Text>
          <Text>Persone seguite</Text>
        </View>

        <View style={styles.strisciaContent}>
          <Text>0</Text>
          <Text>Salvataggi</Text>
        </View>
      </View>

    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex:1,
    // flexDirection: "row",
    alignItems: 'center',
    // justifyContent: 'space-between',
    // paddingHorizontal: 15,
    width: "100%",
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
  userPictur: {
    width: 100,
    height: 100,
    borderRadius: 100,
    borderColor: "#000000",
    borderWidth: 1,
    // marginLeft: 46,
    // backgroundColor: "#ff0000",
  },
  header: {
    flexDirection: "row",
    width: "100%",
    backgroundColor: "#f6f7fb",

    // alignItems:'center',

  },
  strisciaNumeri: {
    backgroundColor: "#f6f7fb",
    flexDirection: "row",
    width: "100%",
    alignItems: 'center',
    justifyContent: 'space-evenly',
    height: 60,
    borderBottomWidth:1,
    borderTopWidth:1,
  },
  strisciaContent: {
    alignItems: 'center',
  },
});
