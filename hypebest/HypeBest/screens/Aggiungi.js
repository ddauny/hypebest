import React, { useState, useEffect } from "react";

import { Select } from "native-base";

import { Text, View, StyleSheet, TextInput,Image } from "react-native";
import * as ImagePicker from 'expo-image-picker';

export default function Aggiungi({ navigation }) {

  const [commento, setCommento] = useState("");

  let [sesso, setSesso] = useState("");
  let [colore, setColore] = useState("");
  let [situazione, setSituazione] = useState("");
  let [modello, setModello] = useState("");
  let [marca, setMarca] = useState("");

  const [image, setImage] = useState(null);

  const pickImage = async () => {
    // No permissions request is necessary for launching the image library
    let result = await ImagePicker.launchImageLibraryAsync({
      mediaTypes: ImagePicker.MediaTypeOptions.All,
      allowsEditing: true,
      aspect: [4, 3],
      quality: 1,
    });

    console.log(result);

    if (!result.cancelled) {
      setImage(result.uri);
    }
  };

  return (
    <View style={styles.container}>

      <TextInput value={commento} onChangeText={text => setCommento(text)} style={styles.textInput} placeholder="Commento" />

      <View style={[styles.containerSelect]}>
        <Select selectedValue={sesso} minWidth="95%" minHeight={41} size={80} accessibilityLabel="Choose Service" placeholder="Sesso:" style={styles.select} _selectedItem={{
          bg: "teal.600",

        }} mt={1} onValueChange={itemValue => setSesso(itemValue)}>
          <Select.Item label="Uomo" value="Uomo" />
          <Select.Item label="Donna" value="Donna" />
        </Select>

        <Select selectedValue={colore} minWidth="95%" minHeight={41} size={80} accessibilityLabel="Choose Service" placeholder="Colore:" style={styles.select} _selectedItem={{
          bg: "teal.600",

        }} mt={1} onValueChange={itemValue => setColore(itemValue)}>
          <Select.Item label="Uomo" value="Uomo" />
          <Select.Item label="Donna" value="Donna" />
        </Select>

        <Select selectedValue={situazione} minWidth="95%" minHeight={41} size={80} accessibilityLabel="Choose Service" placeholder="Situazione:" style={styles.select} _selectedItem={{
          bg: "teal.600",

        }} mt={1} onValueChange={itemValue => setSituazione(itemValue)}>
          <Select.Item label="Uomo" value="Uomo" />
          <Select.Item label="Donna" value="Donna" />
        </Select>

        <Select selectedValue={modello} minWidth="95%" minHeight={41} size={80} accessibilityLabel="Choose Service" placeholder="Modello:" style={styles.select} _selectedItem={{
          bg: "teal.600",

        }} mt={1} onValueChange={itemValue => setModello(itemValue)}>
          <Select.Item label="Uomo" value="Uomo" />
          <Select.Item label="Donna" value="Donna" />
        </Select>

        <Select selectedValue={marca} minWidth="95%" minHeight={41} size={80} accessibilityLabel="Choose Service" placeholder="Marca:" style={styles.select} _selectedItem={{
          bg: "teal.600",

        }} mt={1} onValueChange={itemValue => setMarca(itemValue)}>
          <Select.Item label="Uomo" value="Uomo" />
          <Select.Item label="Donna" value="Donna" />
        </Select>

      </View>

      <Text style={styles.title}
        onPress={() => navigation.navigate('Camera', { screen: 'Camera' })}
      >Apri Camera</Text>

      <Text style={styles.title}
      onPress={pickImage}
        // onPress={() => navigation.navigate('ImagePickerHype', { screen: 'ImagePickerHype' })}
      >Apri Galleria</Text>
      {image && <Image source={{ uri: image }} style={{ width: 200, height: 200 }} />}

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
  textInput: {
    borderWidth: 1,
    borderColor: "gray",
    width: "95%",
    height: 50,
    padding: 10,
    // paddingStart: 30,
    marginTop: 10,
    borderRadius: 15,
    textAlign: "center",
    backgroundColor: "#f6f7fb",
    // marginLeft: "10%",
    // marginRight: "10%",
    // alignItems: "center",
    // justifyContent: "center",
  },
  containerSelect: {
    flex: 1,
    alignItems: 'center',
    // justifyContent: 'center',
  },
  select: {

  }
});
