import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterEventPress'
})
export class filterEventPress implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.title.toLowerCase().indexOf(value.toLowerCase()) !== -1);
      }
    } else {
      return []
    }
  }
}