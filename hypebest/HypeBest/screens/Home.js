import React from "react";

import { View, StyleSheet ,ScrollView} from "react-native";
import Post from "../components/Post"

export default function Home({ navigation }) {
  return (
    <View style={styles.container}>
      <ScrollView style={styles.scrollView}>
        <Post />
        <Post />
        <Post />
      </ScrollView>

    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
  scrollView: {
    width: "100%",
    height: "100%",
    // height:300,
    // marginHorizontal: 20,

},
});
