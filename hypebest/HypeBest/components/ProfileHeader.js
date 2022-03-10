import React from "react";

import { Text, View, StyleSheet, Image } from "react-native";
import logo from '../assets/icon.png';
export default function ProfileHeader(props) {
  const { user } = props;

  return (
    <View style={styles.container}>
      <Image
        style={styles.userPictur}
        source={logo}
      />
      <Text>Username</Text>
      <Text>Bio</Text>

      <View>
        <Text>0</Text>
        <Text>Followers</Text>
      </View>


      <View>
        <Text>0</Text>
        <Text>Persone seguite</Text>
      </View>

      <View>
        <Text>0</Text>
        <Text>Salvataggi</Text>
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flexDirection: "row",
    alignItems: 'center',
    justifyContent: 'space-between',
    paddingHorizontal: 15,
  },
  title: {
    fontSize: 20,
    fontWeight: 'bold',
  },
  userPictur: {
    width: 77,
    height: 77,
    borderRadius: 100,
    marginRight: 10,
  }
});
