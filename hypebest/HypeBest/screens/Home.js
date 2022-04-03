import React from "react";

import { View, StyleSheet, ScrollView } from "react-native";
import Post from "../components/Post"

export default function Home({ navigation }) {
  return (
    <View style={styles.mainContainer}>
      <View style={styles.container}>
        <ScrollView style={styles.scrollView} contentContainerStyle={styles.content} >
          <Post username={"Marco"} descrizione="sjahdaskdkjsahdjasdkjahsd" />
          <Post username={"Daniele"} />
          <Post username={"Baro"} />
        </ScrollView>

      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  mainContainer: { flex: 1 },
  content:{
    alignItems:'center',
    justifyContent:'center'
  },
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    position: "relative",
    // backgroundColor: "#ff0000",
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
  scrollView: {
    width: "100%",
    height: "100%",
    // alignItems: "center",
    // justifyContent: "center",
    // height:300,
    // marginHorizontal: 20,
  },
});
