import React, { useState } from "react";

import { Dimensions, Text, View, StyleSheet } from "react-native";
import { Searchbar } from 'react-native-paper';
import { Select } from "native-base";

export default function Ricerca() {
  const { width, height } = Dimensions.get("window");


  const [searchQuery, setSearchQuery] = useState('');
  const onChangeSearch = query => setSearchQuery(query);


  let [sesso, setSesso] = useState("");
  let [colore, setColore] = useState("");
  let [situazione, setSituazione] = useState("");
  let [modello, setModello] = useState("");
  let [marca, setMarca] = useState("");
  return (
    <View style={styles.container}>
      <Searchbar
        placeholder="Search"
        onChangeText={onChangeSearch}
        value={searchQuery}
        style={styles.search}
      />
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
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
  },
  search: {
    // width:"100%"
  },
  containerSelect: {
    flex: 1,
    alignItems: 'center',
    // justifyContent: 'center',
  },
  select: {

  }
});
